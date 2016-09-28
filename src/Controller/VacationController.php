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

class VacationController extends  AppController 
{
	
    public function initialize() {
	
		parent::initialize();
        $this->loadComponent('Paginator');
		$this->loadComponent('Upload'); 
		$this->loadComponent('Util');  		  		 
	}

    public $paginate = [        
        'limit' => 8,  
        'order' => [
            'T_day_off.id' => 'desc'
        ]
    ];
	 
    public function addVacation() {
    	
        $session        = $this->request->session();
        $userLogin      = $session->read('userLogin');
        
        if ($userLogin) {
         /*
           $idTeam = TableRegistry::get('t_user_team')
                                            ->find('list',['keyField'=>'id', 'valueField'=>'team_id'])
                                            ->where(['t_user_team.user_id'=>$userLogin->id])
                                            ->toArray();
            
            $idLeader = TableRegistry::get('t_projects')
                                            ->find('list',['keyField'=>'id','valueField'=>'leader_id'])
                                            ->where(['t_projects.team_id IN' =>$idTeam ])
                                            ->toArray();
var_dump($idLeader);die;
            $idUser = TableRegistry::get('t_user_team')
                                            ->find('list',['keyField'=>'id','valueField'=>'user_id'])
                                            ->where(['t_user_team.user_id IN'=> $idLeader])
                                            ->toArray();
            
            $e = TableRegistry::get('T_Users')->find('all')->where(['T_Users.id IN'=>$idUser])->toArray();
            echo "<pre>";
            print_r($e);die;
           
            */
            $users = TableRegistry::get('Users')
                                            ->find('all')
                                             ->contain(['Teams'=>['conditions'=>['Teams.status'=>2]],'Teams.Projects'=>['conditions'=>['Projects.status'=>2]],'Teams.Projects.Users'] )                                    
                                            ->where(['Users.id'=>$userLogin->id])
                                            ->toArray();            
            
            $idLeader     = TableRegistry::get('t_projects')
                                                            ->find('list',['keyField'=>'id','valueField'=>'leader_id'])
                                                            ->toArray();
            
            $otherLeader    = TableRegistry::get('T_Users')
                                                        ->find('all')
                                                        ->select(['id','full_name'])
                                                        ->where(['T_Users.id IN'=>$idLeader])
                                                        ->toArray();
             
            $checkisLeader  = TableRegistry::get('Projects')
                                                        ->find('all')
                                                        ->contain(['Users'])
                                                        ->where(['Projects.leader_id'=>$userLogin->id])
                                                        ->first();                                    
            $vacation = TableRegistry::get('T_day_off')->newEntity();   
            
            if ($this->request->is(['post','put'])) {
                if ($this->request->data['start_date'] < $this->request->data['end_date']) {
                    
                    $vacations                  = TableRegistry::get('T_day_off')->patchEntity($vacation, $this->request->data,['validate'=>false]) ;                   
                    $idOther                    = $vacations->ortherleader;                   
                    
                    $emailOther                 = TableRegistry::get('T_Users')
                                                                            ->find('all')
                                                                            ->select(['email','id'])
                                                                            ->where(['T_Users.id'=> $idOther])
                                                                            ->first();              

                    $vacations->created         = date('Y-m-d');
                    $vacations->status          = 0; 
                    $startdate                  = $vacations->start_date   = $this->request->data['start_date'];
                    $enddate                    = $vacations->end_date     = $this->request->data['end_date'];
                    $content                    = $vacations->content;
                    $vacations->full_name       = $userLogin->full_name;
                    $judgework                  = $vacations->judge_work ;
                    $vacations->user_id         = $userLogin->id;
                    $emailAdmin                 = "vuongvo1991@gmail.com";
                    $vacations->other_leader_id = $idOther;

                    //if (TableRegistry::get('T_day_off')->save($vacations)) {
                        foreach ($users as $user) : 
                            if ($user->email != NULL){                                 
                                foreach ($user['teams']  as $team) :   

                                foreach ($team['projects'] as $project) :
                                      echo "<pre>";
                                    print_r($project);die;
                                        $email = array($emailAdmin, $project->user->email);
                                       
                                         /*
                                            $this->sendMail('no-reply-test@nal.vn', $email, 'vacation', 
                                            __('annual leave'), ['enddate'=>$enddate,'startdate'=>$startdate,
                                                                                'full_name'=>$vacations->full_name,
                                                                                'content'=> $content,
                                                                                'judgework'=>$judgework]); */
                                                                                               
                                endforeach;           
                            endforeach;    
                            } 
                            else {
                                die('co gia tri');
                            }           
                           
                        endforeach;     
                        
                         
                        $this->set('error_message', __('Create form Annual leave success'));
                   // }
                   // else {
                     //   $this->set('error_message', __('Save Data Fail'));
                    //}
                }
                else {
                    $this->set('error_message', __('Start date and end date incorrect'));
                }

    	    }
           
              
            $this->set('checkisLeader'  , $checkisLeader);  
            $this->set('vacation'       , $vacation);
             $this->set('otherLeader'   , $otherLeader);
            $this->viewBuilder()->layout('');
        }
        else {
            return $this->redirect('/users/login');
        }
    }

    function leaderDayoff () {
        $session    = $this->request->session();
        $userLogin  = $session->read('userLogin');

        if ($userLogin) {
             $checkisLeader = TableRegistry::get('Projects')
                                                        ->find('all')
                                                        ->contain(['Users'])
                                                        ->where(['Projects.leader_id'=>$userLogin->id])
                                                        ->first();
                                                      
             $vacation = TableRegistry::get('T_day_off')->newEntity();      
            
            if ($this->request->is(['post','put'])) {
                if ($this->request->data['start_date'] < $this->request->data['end_date']) {
                    
                    $vacations                  = TableRegistry::get('T_day_off')->patchEntity($vacation, $this->request->data,['validate'=>false]) ;                                           

                    $vacations->created         = date('Y-m-d');
                    $vacations->status          = 0; 
                    $startdate                  = $vacations->start_date   = $this->request->data['start_date'];
                    $enddate                    = $vacations->end_date     = $this->request->data['end_date'];
                    $content                    = $vacations->content;
                    $vacations->full_name       = $userLogin->full_name;
                    $judgework                  = $vacations->judge_work ;
                    $vacations->user_id         = $userLogin->id;
                    $emailAdmin                 = "vuongvo1991@gmail.com";             

                    if (TableRegistry::get('T_day_off')->save($vacations)) {

                        $this->sendMail('no-reply-test@nal.vn', $emailAdmin, 'vacation', 
                                    __('annual leave'), ['enddate'=>$enddate,'startdate'=>$startdate,
                                                                                'full_name'=>$vacations->full_name,
                                                                                'content'=> $content,
                                                                                'judgework'=>$judgework]);
                         
                        $this->set('error_message', __('Create form Annual leave success'));
                    }
                    else {
                        $this->set('error_message', __('Save Data Fail'));
                    }
                }
                else {
                    $this->set('error_message', __('Start date and end date incorrect'));
                }

            }
            $this->set('checkisLeader',$checkisLeader);
            $this->viewBuilder()->layout('');
        }
        else {
            return $this->redirect('/admin/users/logout');
        }

    }

    function yourVacation() {
        $session        = $this->request->session();
        $userLogin      = $session->read('userLogin');
             
        $checkisLeader  = TableRegistry::get('Projects')
                                                        ->find('all')
                                                        ->contain(['Users'])
                                                        ->where(['Projects.leader_id'=>$userLogin->id])
                                                        ->first();

                                               
        $this->set('checkisLeader',$checkisLeader);
        if ($userLogin) {
               
            $listVacation   = TableRegistry::get('T_day_off');
            $listVacations  = $listVacation->find('all')
                                            ->where(['T_day_off.user_id'=>$userLogin->id]);
                                            
            
            $this->set('T_day_off'      , $this->paginate($listVacations));  
            $this->set('listVacations'  , $listVacations);   
        }
        else {
            return $this->redirect('/users/login');
        }
        
        $this->viewBuilder()->layout('');
    }


    public function listApprove() {
        $session            = $this->request->session();
        $userLogin          = $session->read('userLogin');
        $checkisLeader      = TableRegistry::get('Projects')
                                                        ->find('all')
                                                        ->contain(['Users'])
                                                        ->where(['Projects.leader_id'=>$userLogin->id])
                                                        ->first();

        if ($checkisLeader != NULL) {         
            
            $idTeam         = TableRegistry::get('t_user_team')
                                                            ->find('all')->select(['team_id'])
                                                            ->where(['t_user_team.user_id'=>$userLogin->id])
                                                            ->first();
              
            $idUser         = TableRegistry::get('t_user_team')
                                                            ->find('list',['keyField'=>'id','valueField'=>'user_id'])
                                                            ->where(['t_user_team.team_id'=>$idTeam->team_id])
                                                                ->toArray();
                                                        
                                              
            $listApprove    = TableRegistry::get('T_day_off')
                                                            ->find('all')
                                                            ->where(['T_day_off.user_id IN'=>$idUser,'T_day_off.status'=>0,'T_day_off.user_id !='=>$userLogin->id])
                                                            ->toArray();
            
            $users = TableRegistry::get('Users')->find('all')->contain(['Teams','Teams.Projects','Teams.Projects.Users','Teams.Projects.Users.Dayoff'])->where(['Users.id'=>$userLogin->id])->toArray();
                                                           
            $this->set('listApprove', $listApprove);
        }     
        else {      
            return $this->redirect('/vacation/yourVacation');    
        }
         
        $this->set('checkisLeader',$checkisLeader);
        $this->viewBuilder()->layout('');
    }
     

    function approve($id) {
        $session            = $this->request->session();
        $userLogin          = $session->read('userLogin');
        $checkLeader = TableRegistry::get('t_projects')
                                                    ->find('all')
                                                    ->select(['leader_id'])
                                                    ->where(['t_projects.leader_id'=>$userLogin->id])->first();
        if ( $checkLeader != NULL) {

            if ($this->request->is('post')) {    
                $approve            = TableRegistry::get('T_day_off');
                $approves           = $approve->get($id); 
                $approves->status   = 2;
                
                if ($approve->save($approves)) {
                    return $this->redirect('/vacation/listApprove');
                }
            }       
        }
        else {
            return $this->redirect('/vacation/yourVacation');
        }         
        $this->viewBuilder()->layout('');

    }

    function cancelVacation($id){

        $approve            = TableRegistry::get('T_day_off');
        $approves           = $approve->get($id); 
        $approves->status   = 1;
        
        if ($approve->save($approves)) {
            return $this->redirect('/vacation/listApprove');
        }
        
    }
    
    public function total() {
        $session    = $this->request->session();
        $userLogin  = $session->read('userLogin');
       
        $total          = TableRegistry::get('T_day_off');
        $totalVacation  = $total->find('all')->where(['T_day_off.user_id' =>$userLogin->id])->count();
        return $totalVacation; 
        
    }

    public function totalApprove() {
        $session    = $this->request->session();
        $userLogin  = $session->read('userLogin');  
          
        $approve        = TableRegistry::get('T_Users');
        $approves       = $approve
                                ->find('list', ['keyField' => 'id', 'valueField' => 'id'])
                                ->where(['T_Users.project_id'=>$userLogin->project_id])
                                ->toArray();
        
        $dayOff = TableRegistry::get('T_day_off')->find('all')
                                                            ->where(['T_day_off.user_id IN'=>$approves,'T_day_off.status'=>0,'T_day_off.user_id !='=> $userLogin->id])                                                             
                                                            ->orWhere(['T_day_off.other_leader_id'=>$userLogin->id,'T_day_off.status'=>0])
                                                            ->count();
        
        return $dayOff;
    }

    public function listdayoff () {
        $session    = $this->request->session();
        $userLogin  = $session->read('userLogin');

        $checkLeader = TableRegistry::get('t_projects')
                                                    ->find('all')
                                                    ->select(['leader_id','team_id'])
                                                    ->where(['t_projects.leader_id'=>$userLogin->id])->first();
        $data = TableRegistry::get('t_user_team')->find('list',['keyField'=>'id','valueField'=>'user_id'])->where(['t_user_team.team_id'=>$checkLeader->team_id])->toArray();
        echo "<pre>";
        print_r($data);die;

        if ( $checkLeader != NULL) {

            $this->viewBuilder()->layout('');       
        }
        else {
            return $this->redirect('/vacation/yourVacation');
        }         
       

    }

    public function listLeader() {
        $user_id     = $this->request->data['id'];
        $otherLeader = TableRegistry::get('Users')
                                            ->find('all')
                                             ->contain(['Teams'=>['conditions'=>['Teams.status'=>2]],'Teams.Projects'=>['conditions'=>['Projects.status'=>2]],'Teams.Projects.Users'] )                                    
                                            ->where(['Users.id'=>$user_id])
                                            ->toArray();

        $team_ids = TableRegistry::get('t_user_team')
                                ->find('list',['keyField'=>'id', 'valueField'=>'team_id'])
                                ->where(['t_user_team.user_id' => $user_id])
                                ->toArray();

        $leader_ids = TableRegistry::get('Projects')
                                            ->find('list',['keyField'=>'id', 'valueField'=>'leader_id'])
                                            ->where(['Projects.team_id IN' => $team_ids])
                                            ->toArray();

        $leaders = TableRegistry::get('Users')->find('all')
                                            ->select(['id', 'full_name', 'email'])
                                            ->where(['Users.id IN' => $leader_ids])
                                            ->toArray();

        die(json_encode($leaders));
    }

    public function mAdd() {
        
        $vacation = TableRegistry::get('T_day_off')->newEntity();
        $vacation->user_id       = $this->request->data['id'];
        $user = TableRegistry::get('Users')
                    ->find('all')
                    ->select(['id', 'full_name', 'email'])
                    ->where(['Users.id' => $vacation->user_id])
                    ->first();

        $vacation->full_name       = $user->full_name;
        $start_date = Time::parseDate($this->request->data['start_date'], 'dd/MM/yyyy HH:mm');
        $vacation->start_date       = $start_date;
        $end_date = Time::parseDate($this->request->data['end_date'], 'dd/MM/yyyy HH:mm');
        $vacation->end_date       = $end_date;
        $vacation->phone       = $this->request->data['phone'];
        $vacation->content       = $this->request->data['content'];
        $vacation->judge_work       = $this->request->data['judge_work'];
        $vacation->leader_id      = $this->request->data['leader_id'];

        

        if(TableRegistry::get('T_day_off')->save($vacation)) {
            $leader = TableRegistry::get('Users')
                    ->find('all')
                    ->select(['id', 'full_name', 'email'])
                    ->where(['Users.id' => $vacation->leader_id])
                    ->first();

            $from = $user->email;
            $to = $leader->email;
            $subject = "Time Off";

            $this->sendMail('no-reply-test@nal.vn', $to, 'vacation',  __($subject),
                            ['name_leader' => $leader->full_name,
                            'start_date' => $vacation->start_date,
                            'end_date' => $vacation->end_date,
                            'full_name' => $vacation->full_name,
                            'content' => $vacation->content,
                            'judge_work' => $vacation->judge_work]);

            die("Success");
        }

        die("Fail");
    }

    public function listTimeOff() {
        $user_id     = $this->request->data['id'];

        $listVacation   = TableRegistry::get('T_day_off');
        $listVacations  = $listVacation->find('all')
                                        ->where(['T_day_off.user_id' => $user_id])
                                        ->toArray();

        foreach ($listVacations as $key => $value) {
            $listVacations[$key]->start_date = $value->start_date->format('d-m-Y H:i');
            $listVacations[$key]->end_date = $value->end_date->format('d-m-Y H:i');
        }

        die(json_encode($listVacations));
    }

}