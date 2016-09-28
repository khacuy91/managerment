<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\I18n;
use Cake\View\Helper;

class ProjectsController extends  AppController 
{
	
    public function initialize()
	{
		parent::initialize();
		$this->loadComponent('Upload'); 
		$this->loadComponent('Util');  	
		$this->loadComponent('Session');  		  		 
	}

	public function createProjects() {
		$session 	= $this->request->session();
		$adminLogin = $session->read('adminLogin');
		
		if ($adminLogin) {		  
        	 
			$listTeam = TableRegistry::get('Teams')
												->find('all')												 
												->toArray();
			 								
			$project = TableRegistry::get('t_projects')->newEntity();
			if ($this->request->is(['post','put'])) {	 
				
				$dataProject = TableRegistry::get('t_projects')->patchEntity($project, $this->request->data);
				$idTeam = $dataProject->team_id;

				 
			}									
			$this->set('listTeam', $listTeam); 																	
		}
		else {
			return $this->redirect('/admin/users/logout');
		}
	} 


	 




}
?>