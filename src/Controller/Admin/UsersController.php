<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\I18n;
use Cake\View\Helper;

class UsersController extends  AppController 
{
	
    public function initialize()
	{
		parent::initialize();
		$this->loadComponent('Upload'); 
		$this->loadComponent('Util');  	
		$this->loadComponent('Session');  		  		 
	}

	function login() {
		$session 	= $this->request->session();
		$adminLogin = $session->read('adminLogin');

		if ($adminLogin) {
			$this->request->session()->write('is_authorized', true);
			return $this->redirect('/admin/users/dashboard');
		}
		else {
			$admin = TableRegistry::get('T_Administrators');
			if ($this->request->is('post')) {

				$username 		= $this->request->data['username'];
				$password 		= md5($this->request->data['password']);
				$adminLogin 	= $admin->find('all')
										->where(['T_Administrators.username'=> $username ,'T_Administrators.password' =>$password])
										->first();

				if ($adminLogin) {

					$session = $this->request->session();
					$session->write('adminLogin', $adminLogin);
					return $this->redirect('/admin/users/dashboard');		
				}
				else {
					$this->set('error_message',__('Username or password not match'));
				}					
			}

			$this->viewBuilder()->layout('');
		}
	}
	

	function logout(){
		$session 	= $this->request->session();
		$adminLogin = $session->read('adminLogin');

		if ($adminLogin) {
			
			$session->delete('adminLogin');
			return $this->redirect('/admin/users/login');
		}
		else {
			return $this->redirect('/admin/users/login');
		}
	}


	function dashboard() {
		$session 	= $this->request->session();
		$adminLogin = $session->read('adminLogin');
		if ($adminLogin) {
			 
		}
		else {
			return $this->redirect('/users/admin/login');
		}
	}	
	function register() {
		$session 	= $this->request->session();
		$adminLogin = $session->read('adminLogin');

		if ($adminLogin) {
			$userRegister 		= TableRegistry::get('T_Users')->newEntity();
			
			if ($this->request->is('post')) {
				
				$userRegisters 	= TableRegistry::get('T_Users')->patchEntity($userRegister, $this->request->data);
				$email 			= $this->request->data['email'];
				$check 			= TableRegistry::get('T_Users');
				$checkUser 		= $check
										->find('all')
										->where(['T_Users.email'=>$email])
										->first();
				
				if ($checkUser) {
					$this->set('error_message',__('Email is already exits'));
				}
				else {	
					$userRegisters->created 	= date('Y-m-d');
					$userRegisters->password 	= md5($this->request->data['password']); 
					if(TableRegistry::get('T_Users')->save($userRegisters)) {
						$this->set('error_message',__('Register successfull'));
					}
					else {
						$this->set('error_message',__('Register fail'));
					}
				}
			}
		}
		else {
			return $this->redirect('/admin/users/login');
		}
	}
	


}
?>