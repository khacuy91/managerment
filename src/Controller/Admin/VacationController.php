<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\I18n;
use Cake\View\Helper;

class VacationController extends  AppController 
{
	
    public function initialize()
	{
		parent::initialize();
		$this->loadComponent('Upload'); 
		$this->loadComponent('Util');  		  		 
	}


	function listApprove() {
		$session 	= $this->request->session();
		$adminLogin = $session->read('adminLogin');

		if ($adminLogin) {
			$idLeader 		= TableRegistry::get('t_projects')
														->find('list',['keyField' =>'id','valueField'=>'leader_id'])
														->toArray();
			
			$leaderDayoff 	= TableRegistry::get('t_day_off')
														->find('all')
														->where(['t_day_off.user_id IN'=>$idLeader,'t_day_off.status'=>0])
														->toArray(); 												 	

			$this->set('leaderDayoff', $leaderDayoff);
		}
		else {
			return $this->redirect('/admin/users/login');
		}
	}


	function approve($id) {
		$session 	= $this->request->session();
		$adminLogin = $session->read('adminLogin');

		if ($adminLogin) {
			 if ($this->request->is('post')) {    
                $approve            = TableRegistry::get('t_day_off');
                $approves           = $approve->get($id); 
                $approves->status   = 2;
                
                if ($approve->save($approves)) {
                    return $this->redirect('/admin/vacation/listApprove');
                }
            }
		}
		else {
			return $this->redirect('/admin/users/login');
		}
	}

	function cancelVacation($id) {
		$session 	= $this->request->session();
		$adminLogin = $session->read ('adminLogin');

		if ($adminLogin) {
		 	$approve            = TableRegistry::get('t_day_off');
        	$approves           = $approve->get($id); 
        	$approves->status   = 1;
        
        	if ($approve->save($approves)) {
            	return $this->redirect('/admin/vacation/listApprove');
        	}
        
		}
		else {
			return $this->redirect('/admin/users/logout');
		}

	}

	public function adminTotal() {
		$idLeader 		= TableRegistry::get('t_projects')
														->find('list',['keyField' =>'id','valueField'=>'leader_id'])
														->toArray();
			
		$leaderDayoff 	= TableRegistry::get('t_day_off')
														->find('all')
														->where(['t_day_off.user_id IN'=>$idLeader,'t_day_off.status'=>0])
														->count(); 	
		return $leaderDayoff;												
	}

	


}
?>