<?php 
namespace App\Controller;

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
	}
	 

	public function login() {
	
		$session 		= $this->request->session();
		$userLogin 		= $session->read('userLogin');
		
		if ($userLogin) {
			$this->request->session()->write('is_authorized', true);
			return $this->redirect('/users/myPage');
		}
		else {					
			if ($this->request->is('post')) {
				$email 		= $this->request->data['email'];
				$password 	= md5($this->request->data['password']);
				
				$users 		= TableRegistry::get('T_Users');			 
				$userLogin 	= $users->find()
									->where(['T_Users.email' => $email, 'T_Users.password' => $password])
									->first();					 		
				
				if ($userLogin) {
					$session = $this->request->session();
					$session->write('userLogin', $userLogin);
					
					return $this->redirect('/vacation/yourVacation');
				}
				else {
					$this->set('error_message', __('Wrong email or password'));
				}
			}
			$this->viewBuilder()->layout('');
		}		
	}


	public function myPage() {
		$session 	= $this->request->session();
		$userLogin 	= $session->read('userLogin');
		 
		if ($userLogin) {			 
			$this->viewBuilder()->layout('');	
		}
		else {
			return $this->redirect('/users/login');
		}
			
	}

	public function logout() {
		 $session 		= $this->request->session();
		 $userLogin 	= $session->read('userLogin');

		if($userLogin) {
			$session->delete('userLogin');
		}

		return $this->redirect("/users/login");
		 
	}
	public function changePassword() {

		$session 		= $this->request->session();
		$userLogin 		= $session->read('userLogin');
		if ($userLogin) {
			$users 		= TableRegistry::get('T_Users')->newEntity();				
			if ($this->request->is('post')) {
				if (!$userLogin->errors()) {
					$userChangepassword 		= TableRegistry::get('T_Users')->patchEntity($users, $this->request->data,['validate' => true]);
					$curPassword 				= md5($this->request->data['current_password']); 
					
					if (strcmp($this->request->data['new_password'], $this->request->data['password_confirm'] == 0) && $curPassword != NULL) {
						if ($userLogin->password != $curPassword) {					 
				 			$this->set('error_message',__("old password not match")); 
						}
						else {
							$userLogin->password = md5($this->request->data['new_password']);
			  				if (TableRegistry::get('T_Users')->save($userLogin)) {
                            	$this->set('error_message',__(" change password success"));                                           
                        	}					
						}
					}
					else {
						$this->set('error_message', __('password and confrim password not match'));
					} 	 	
				}
			}
		}
		else {
			$this->redirect("/users/login");
		}
		$this->viewBuilder()->layout('');
	}

	function updateProfile($id){
		$session 	= $this->request->session();
		$userLogin 	= $session->read('userLogin');

		if ($userLogin) {
			$dataUser = TableRegistry::get('T_users')->find('all')
													->where(['T_Users.id'=>$userLogin->id])->first();

			
			if ($this->request->is(['post','put'])) {
				$updateProfile 				= TableRegistry::get('T_Users')->patchEntity($dataUser, $this->request->data);
				$updateProfile->updated 	= date('Y-m-d'); 			 
				if (TableRegistry::get('T_Users')->save($updateProfile)) {
					$this->set('error_message', __('Edit profile success'));
				} 
				else {
						$this->set('error_message', __('Edit profile fail'));
				}
			}
			$this->set('dataUser', $dataUser);
			$this->viewBuilder()->layout('');
		}
		else {
			return $this->redirect('/users/login');
		}
	}

	function mLogin() {
		$userLogin = null;

		if ($this->request->is('post')) {
			$email 		= $this->request->data['email'];
			$password = md5($this->request->data['password']);

			$users 		= TableRegistry::get('T_Users');
			$userLogin 	= $users->find()
							->where(['T_Users.email' => $email, 'T_Users.password' => $password])
							->first();
		}

		die(json_encode($userLogin));
	}


}	


	 