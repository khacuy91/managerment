<?php 
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\I18n;
use Cake\View\Helper;
use Cake\I18n\Time;
use Cake\Mailer\Email;

class APIController extends  AppController 
{
	
    public function initialize() {
		parent::initialize();
	}

    function isLeader($id) {
        $leader_project = TableRegistry::get('t_projects')
                                ->find('all')
                                ->where(['t_projects.leader_id' => $id])
                                ->first();

        return $leader_project;
    }

    function login() {
        $userLogin = null;

        if ($this->request->is('post')) {
            $email      = $this->request->data['email'];
            $password = md5($this->request->data['password']);

            $userLogin  = TableRegistry::get('T_Users')
                            ->find('all')
                            ->where(['T_Users.email' => $email, 'T_Users.password' => $password])
                            ->first();

            if ($userLogin) {
                if ($this->isLeader($userLogin->id)) {
                    $userLogin->token_id = $this->request->data['token_id'];
                    TableRegistry::get('T_Users')->save($userLogin);
                    $userLogin->is_leader = true;
                }
                else {
                    $userLogin->is_leader = false;
                }
            }
        }

        die(json_encode($userLogin));
    }

    function changePassword() {
        $id                 = $this->request->data['id'];
        $old_password       = md5($this->request->data['old_password']);
        $new_password       = $this->request->data['new_password'];
        $confirm_password   = $this->request->data['confirm_password'];

        $user = TableRegistry::get('Users')
                    ->find('all')
                    ->where(['Users.id' => $id, 'Users.password' => $old_password])
                    ->first();

        if(!$user) {
            die('null');
        }
        else {
            $user->password = md5($new_password);
            if (TableRegistry::get('Users')->save($user)) {
                die('Success');
            }
            else {
                die('Fail');
            }
        }
    }

    public function listLeader() {
        $user_id     = $this->request->data['id'];

        $otherLeader = TableRegistry::get('Users')
                                            ->find('all')
                                            ->contain(['Teams'=>['conditions'=>['Teams.status'=>2]],'Teams.Projects'=>['conditions'=>['Projects.status'=>2]],'Teams.Projects.Users'] )                                    
                                            ->where(['Users.id'=>$user_id])
                                            ->first();

        $leaders = [];

        foreach ($otherLeader->teams as $key => $team) {
            foreach ($team->projects as $key => $project) {
                array_push($leaders, $project->user);
            }
        }

        die(json_encode($leaders));
    }

    public function addTimeOff() {
        $date_time_format = 'dd/MM/yyyy - HH:mm';

        $vacation = TableRegistry::get('T_day_off')->newEntity();
        $vacation->user_id       = $this->request->data['user_id'];
        $user = TableRegistry::get('Users')
                    ->find('all')
                    ->select(['id', 'full_name', 'email', 'token_id'])
                    ->where(['Users.id' => $vacation->user_id])
                    ->first();

        $vacation_id = $this->request->data['vacation_id'];
        if ($vacation_id >= 0) {
            $vacation->id = $vacation_id;
        }

        $vacation->full_name        = $user->full_name;
        $start_date = Time::parseDate($this->request->data['start_date'], $date_time_format);

        $vacation->start_date       = $start_date;
        $end_date = Time::parseDate($this->request->data['end_date'], $date_time_format);
        $vacation->end_date         = $end_date;
        $vacation->phone            = $this->request->data['phone'];
        $vacation->content          = $this->request->data['content'];
        $vacation->judge_work       = $this->request->data['judge_work'];
        $leader_id                  = $this->request->data['leader_id'];

        if ($leader_id >= 0) {
            $vacation->leader_id    = $leader_id;
        }

        $vacation->status          = $this->request->data['status'];

        if(TableRegistry::get('T_day_off')->save($vacation)) {

            $leaders = [];

            if ($vacation->leader_id) {
                $leader = TableRegistry::get('Users')
                    ->find('all')
                    ->select(['id', 'full_name', 'email', 'token_id'])
                    ->where(['Users.id' => $vacation->leader_id])
                    ->first();

                array_push($leaders, $leader);
            }
            else {
                $otherLeader = TableRegistry::get('Users')
                                            ->find('all')
                                            ->contain(['Teams'=>['conditions'=>['Teams.status'=>2]],'Teams.Projects'=>['conditions'=>['Projects.status'=>2]],'Teams.Projects.Users'] )                                    
                                            ->where(['Users.id' => $vacation->user_id])
                                            ->first();
                foreach ($otherLeader->teams as $key => $team) {
                    foreach ($team->projects as $key => $project) {
                        array_push($leaders, $project->user);
                    }
                }
            }

            $from = $user->email;
            $to = 'no-reply-test@nal.vn';
            $subject = "Time Off";

            if ($leaders) {
                $token_ids = [];

                foreach ($leaders as $key => $leader) {
                    array_push($token_ids, $leader->token_id);

                    $this->sendMail('no-reply-test@nal.vn', $leader->email, 'vacation',  $subject,
                            ['name_leader' => $leader->full_name,
                            'start_date' => $vacation->start_date,
                            'end_date' => $vacation->end_date,
                            'full_name' => $vacation->full_name,
                            'content' => $vacation->content,
                            'judge_work' => $vacation->judge_work]);
                }

                # Send notification
                $body = $vacation->start_date . " to " . $vacation->end_date;
                $this->pushNotification($token_ids, $vacation->full_name, $body);
            }
            else {
                $admin = TableRegistry::get('t_administrators')
                    ->find('all')
                    ->select(['id', 'username', 'email'])
                    ->first();
                    
                $to = $admin->email;

                $this->sendMail('no-reply-test@nal.vn', $to, 'vacation',  __($subject),
                            ['name_leader' => 'Admin',
                            'start_date' => $vacation->start_date,
                            'end_date' => $vacation->end_date,
                            'full_name' => $vacation->full_name,
                            'content' => $vacation->content,
                            'judge_work' => $vacation->judge_work]);
            }

            die("Success");
        }

        die("null");
    }

    public function listTimeOff() {
        $date_time_format = 'd/m/Y - H:i';

        $user_id     = $this->request->data['user_id'];

        $listVacation   = TableRegistry::get('T_day_off');
        $listVacations  = $listVacation->find('all')
                                        ->where(['T_day_off.user_id' => $user_id])
                                        ->toArray();

        foreach ($listVacations as $key => $value) {
            $listVacations[$key]->start_date = $value->start_date->format($date_time_format);
            $listVacations[$key]->end_date = $value->end_date->format($date_time_format);
        }

        die(json_encode($listVacations));
    }

    public function listOfMember() {
        $date_time_format = 'd/m/Y - H:i';

        $leader_id     = $this->request->data['leader_id'];

        
        $team_ids = TableRegistry::get('Projects')
                                ->find('list',['keyField'=>'id', 'valueField'=>'team_id'])
                                ->where(['Projects.leader_id' => $leader_id])
                                ->toArray();

        if (!$team_ids) {
            die('null');
        }

        $user_ids = TableRegistry::get('t_user_team')
                            ->find('list',['keyField'=>'id', 'valueField'=>'user_id'])
                            ->where(['t_user_team.team_id IN' => $team_ids])
                            ->toArray();

        $listVacations  = TableRegistry::get('T_day_off')
                                ->find('all')
                                ->where(['T_day_off.user_id IN' => $user_ids])
                                ->toArray();

        foreach ($listVacations as $key => $value) {
            $listVacations[$key]->start_date = $value->start_date->format($date_time_format);
            $listVacations[$key]->end_date = $value->end_date->format($date_time_format);
        }

        die(json_encode($listVacations));
    }

    public function updateVacationStatus() {
        $vacation_id     = $this->request->data['vacation_id'];
        $vacation_status     = $this->request->data['status'];

        $vacation = TableRegistry::get('T_day_off')->get($vacation_id);
        $vacation->status = $vacation_status;

        if(TableRegistry::get('T_day_off')->save($vacation)) {
            $this->listOfMember();
        }

        die("null");
    }

    function pushNotification(array $token_ids, $title, $body) {
        $this->Gcm->sendData($token_ids,
                        [
                            'title' => $title,
                            'body' => $body
                        ]);
    }



}