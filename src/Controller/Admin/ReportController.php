<?php
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\Network\Exception\InvalidCsrfTokenException;
use Cake\Event\Event; 

class ReportController extends AppController {
 
	function initialize(){
		parent::initialize();
		$this->loadComponent('Upload');	 
		$this->loadComponent('Util');
		$this->loadComponent('Paginator');          
	}

	 


	public function listReportt() {
		if ($this->request->is('post')){
			
			$startdate 		= $this->request->data['start_date'];
			$enddate 		= $this->request->data['end_date'];
			$Report 		= TableRegistry::get('T_annualleave') ;
			$listReports 	= $Report->find('all')->where(['T_annualleave.startdate >='=> $startdate,
														'T_annualleave.enddate <=' =>$enddate])
																					->toArray();
    		 
    		$this->set('listReports', $listReports);				    	
    
		}							 

	}

	public function listReport() {
		$session = $this->request->session();
		$adminLogin = $session->read('adminLogin');

		if ($adminLogin) {
			if ($this->request->is('post')) {
				$startdate 		= $this->request->data['start_date'];

				$enddate 		= $this->request->data['end_date']; 
				$end_date 		=  date('Y/m/d h:i A', strtotime($enddate));
				 
				 
				$Report 		= TableRegistry::get('t_day_off') ;
				 
				$listReports 	= $Report->find('all')
													->where(['t_day_off.start_date >='=> $startdate,
													't_day_off.end_date <=' =>$end_date])
													->order(['created' => 'ASC'])
													->toArray();	     	
    			if ($listReports) {
    				$this->set('listReports', $listReports);  			  
    			}
    			else {  			 
    			  	$this->set('error_message', __('No resutl'));
    			}			 
			}	
		}
		else {
			return $this->redirect('/admin/users/login');
		}
			
	}

}
?>