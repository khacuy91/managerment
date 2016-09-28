<?php 
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\I18n;
use Cake\View\Helper;

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
            $users = TableRegistry::get('Users')
                                            ->find('all')
                                            ->contain(['Teams','Teams.Users','Teams.Projects.Users'] )
                                            ->where(['Users.id'=>$userLogin->id])
                                            ->toArray();                                                           
            
            foreach ($users as $key => $value) :                  
                foreach ($value['teams'] as $key => $data) :                       
                    foreach ($data['projects'] as $emailLeaders) :
                        $email =  $emailLeaders->user->email;                                        
                    endforeach;           
                endforeach;   
            endforeach;    
                                     
            $teamUser           = TableRegistry::get('t_user_team')
                                                            ->find('all')
                                                            ->select(['team_id'])
                                                            ->where(['t_user_team.user_id'=>$userLogin->id])
                                                            ->first();
            
            $team               = TableRegistry::get('t_teams')
                                                            ->find('all')
                                                            ->select(['id'])
                                                            ->where(['t_teams.id'=>$teamUser->team_id])
                                                            ->first();
            
                                                               
            $idUser             = TableRegistry::get('t_projects')
                                                            ->find('all')
                                                            ->select(['team_id','leader_id'])
                                                            ->where(['t_projects.team_id'=>$team->id])
                                                            ->first(); 

                                                                                                       
            $emailLeaders       = TableRegistry::get('T_Users')
                                                            ->find('all')
                                                            ->select(['email','full_name','id'])
                                                            ->where(['T_Users.id'=>$idUser->leader_id])
                                                            ->first();                  


            $otherLeader        = TableRegistry::get('T_Users')
                                                            ->find('all')
                                                            ->select(['email','full_name','id'])
                                                            ->where(['T_Users.id != '=>$idUser->leader_id])
                                                            ->toArray();           
 

            $vacation           = TableRegistry::get('T_day_off')->newEntity();     
            if ($this->request->is(['post','put'])) {
                if ($this->request->data['start_date'] < $this->request->data['end_date']) {
                    
                    $vacations                  = TableRegistry::get('T_day_off')->patchEntity($vacation, $this->request->data,['validate'=>false]) ;                   
                    $idOther                    = $vacations->ortherleader;
                    var_dump($idOther);die;
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

                    if ($emailOther != NULL) {
                        $email                  = array($emailAdmin, $emailOther->email);     
                    }
                    else {
                        $email                  = array($emailAdmin, $emailLeaders->email);               
                    }

                    if (TableRegistry::get('T_day_off')->save($vacations)) {

                        $this->sendMail('no-reply-test@nal.vn', $email, 'vacation', 
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
            $checkLeader = TableRegistry::get('t_projects')
                                                        ->find('all')
                                                        ->where(['t_projects.id'=>$userLogin->project_id])
                                                        ->first();
            
            $this->set('checkLeader'    , $checkLeader);
            $this->set('emailLeaders'   , $emailLeaders);
            $this->set('vacation'       , $vacation);
            $this->viewBuilder()->layout('');
        }
        else {
            return $this->redirect('/users/login');
        }
    }

    
    function yourVacation() {
        $session    = $this->request->session();
        $userLogin  = $session->read('userLogin');
             
        $checkLeader = TableRegistry::get('t_projects')
                                                    ->find('all')
                                                    ->where(['t_projects.id'=>$userLogin->project_id])
                                                    ->first();
        $this->set('checkLeader',$checkLeader);
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


    function listApprove() {
        $session            = $this->request->session();
        $userLogin          = $session->read('userLogin');
        $checkisLeader      = TableRegistry::get('t_projects')
                                                            ->find('all')
                                                            ->select(['leader_id'])
                                                            ->where(['t_projects.leader_id'=>$userLogin->id])
                                                            ->first();

        if ($checkisLeader != NUll) {
            $approve        = TableRegistry::get('T_Users');
            $approves       = $approve
                                    ->find('list', ['keyField' => 'id', 'valueField' => 'id'])
                                    ->where(['T_Users.project_id'=>$userLogin->project_id])
                                    ->toArray();
            
            
            $dayOff         = TableRegistry::get('T_day_off')
                                                            ->find('all')
                                                            ->where(['T_day_off.user_id IN'=>$approves,'T_day_off.status'=>0,'T_day_off.user_id !='=> $userLogin->id])                                                              
                                                            ->orWhere(['T_day_off.other_leader_id'=>$userLogin->id,'T_day_off.status'=>0])  
                                                            ->toArray();
                    
            $this->set('dayOff', $dayOff);
        }     
        else {
            return $this->redirect('/vacation/yourVacation');    
        }
        $checkLeader    = TableRegistry::get('t_projects')->find('all')->where(['t_projects.id'=>$userLogin->project_id])->first();
        $this->set('checkLeader',$checkLeader);
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

    public function editVacation($id) {
        $session    = $this->request->session();
        $userLogin  = $session->read('userLogin');

        if ($userLogin) {
            $leader         = TableRegistry::get('t_projects')
                                                        ->find('all')
                                                        ->select(['id','leader_id'])
                                                        ->where(['t_projects.id'=>$userLogin->project_id])
                                                        ->first();
            
            $emailLeaders   = TableRegistry::get('T_Users')
                                                        ->find('all')
                                                        ->select(['id','full_name','email'])
                                                        ->where(['T_Users.id'=>$leader->leader_id])
                                                        ->first();
            
            $dataUser       = TableRegistry::get('T_day_off')
                                                        ->find('all')
                                                        ->where(['T_day_off.id'=>$id,'T_day_off.user_id'=>$userLogin->id])
                                                        ->first();

           
            $other          = TableRegistry::get('t_projects')
                                                        ->find('list', ['keyField' => 'id', 'valueField' => 'leader_id'])
                                                        ->toArray();
              
            $otherLeader    = TableRegistry::get('T_Users')
                                                        ->find('all')
                                                        ->select(['email','full_name','id'])                              
                                                        ->where(['id IN'=>$other,'T_Users.project_id !=' =>$userLogin->project_id])
                                                        ->toArray();
            
            $checkLeader    = TableRegistry::get('t_projects')
                                                        ->find('all')
                                                        ->where(['t_projects.id'=>$userLogin->project_id])
                                                        ->first();

            if ($this->request->is(['post','put'])) {
                
                if ($this->request->data['start_date'] < $this->request->data['end_date']) {

                    $editDayoff                         = TableRegistry::get('T_day_off')->patchEntity($dataUser, $this->request->data);
                    $editDayoff->updated                = date('Y-m-d'); 
                    
                    if ($dataUser->other_leader_id == NULL ) {
                        $editDayoff->other_leader_id    = $this->request->data['ortherleader']; 
                    }
                    else {
                        $editDayoff->other_leader_id    = $dataUser->other_leader_id; 
                    }
                
                    if (TableRegistry::get('T_day_off')->save($editDayoff)) {
                        $this->set('error_message', __('Edit success'));
                    } 
                    else {
                        $this->set('error_message', __('Edit Fail'));
                    }
                }
                else {
                    $this->set('error_message', __('Start Date and End Date incorrect'));
                }
                
            } 

            $this->set('checkLeader'    , $checkLeader);                                            
            $this->set('dataUser'       , $dataUser);
            $this->set('otherLeader'    , $otherLeader);
            $this->set('emailLeaders'   , $emailLeaders);
            $this->viewBuilder()->layout('');   
        }
        else {
            return $this->redirect('users/login');
        } 

    }


    function delete($id) {
        $session = $this->request->session();
        $userLogin = $session->read('userLogin');

        if ($userLogin) {
            $dateOff    = TableRegistry::get('T_day_off');
            $query      = $dateOff->query()->delete()
                                        ->where(['id'=>$id])
                                        ->execute();
            if ($query) {
                $this->redirect('/vacation/yourVacation');
            }
        }
        else {
            return $this->redirect('/users/login');
        }
    }

 
    

/*
$connection = ConnectionManager::get('default');
$results = $connection
            ->newQuery()
            ->select('*')
            ->from('T_annualleave')
            ->where(['user_id IN'=>$userTeams])

            ->execute()
            ->fetchAll('assoc');
*/
}
?>