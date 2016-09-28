<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\I18n;
use Cake\View\Helper;

class TeamsController extends  AppController 
{
	
    public function initialize()
	{
		parent::initialize();
		$this->loadComponent('Upload'); 
		$this->loadComponent('Util');  	
		$this->loadComponent('Session');  		  		 
	}




	public function create() {
		$session 	= $this->request->session();
		$adminLogin = $session->read('adminLogin');

		if ($adminLogin) {
			$dataUsers 		= TableRegistry::get('T_users')
													->find('all')
													->select(['id','full_name'])
													->toArray();

			$team 			= TableRegistry::get('T_teams')->newEntity();
			$teamUser 		= TableRegistry::get('T_user_team')->newEntity();		 
			if ($this->request->is(['post','put'])) {
				
				$dataTeam 				= TableRegistry::get('T_teams')->patchEntity($team, $this->request->data);
				 	 
				$array = array_values($dataTeam->userteam);				 		 
				$teamUsers 				= TableRegistry::get('t_user_team')->patchEntity($teamUser, $this->request->data);			
				$dataTeam->created 		= date('Y-m-d');
				
				foreach ($array  as $key => $value) :	 
				if (TableRegistry::get('T_teams')->save($dataTeam)) {					
					
					$id 				= $dataTeam->id;
					$teamUsers->team_id = $id;
							 
						$teamUsers->user_id = $data;  

						TableRegistry::get('t_user_team')->save($teamUsers);
						$this->set('error_message', __('Created Team success')); 					 
				}
				endforeach;
			}									
			$this->set('dataUsers', $dataUsers);									
		}
		else {
			return $this->redirect('/admin/users/logout');
		}
	} 


	function listTeam() {
		$session 	= $this->request->session();
		$adminLogin = $session->read('adminLogin');

		if ($adminLogin) {
			$listTeam = TableRegistry::get('T_teams')
												->find('all')
												->toArray();
			$this->set('listTeam', $listTeam); 									
		}
		else {
			return $this->redirect('/admin/users/logout');
		}
	}




}
?>