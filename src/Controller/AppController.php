<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Network\Exception\SocketException;
use Cake\I18n\I18n;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */

class AppController extends Controller
{

     var $components = array('Session', 'Cookie'); 
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $session = $this->request->session();
        
        if(!$session->check('language')) {
            $session->write('language','vi_VN');
          //  I18n::locale($session->read('language'));  
        }
        
        
        
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $this->loadComponent('ker0x/CakeGcm.Gcm', [
            'api' => [
            'key' => 'AIzaSyCxFhJCkomWuEAn5wCffqz6xRHKtnzZOVw'
        ]
]);
       
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
   
    public function beforeFilter(Event $event){

      //ini_set('intl.default_locale', $this->request->session()->read('language'));

        I18n::locale($this->request->session()->read('language'));
       
        if(isset($this->request->params['prefix']))
        {
                if( $this->request->params['prefix'] == 'admin'  ){
                    if($this->request->params['action'] != 'login'){
                       
                        $this->viewBuilder()->layout( 'admin' );
                    }
                    else {
                      
                        $this->viewBuilder()->layout( '/admin/login' );
                    }
                }
        }
        else {
            $this->viewBuilder()->layout( 'default' );
            $session    = $this->request->session();
            $adminLogin = $session->read('adminLogin');
            if($adminLogin) $this->set('adminLogin', $adminLogin);

             

        }

    }

    public function sendMail($from, $to, $template, $subject, $vars){
        try {
            $email = new Email('default');

            $email->template($template, 'default')
                ->emailFormat('html')
                ->from($from)
                ->to($to)
                ->subject($subject)
                ->viewVars($vars)
                ->send();
                return true;
        }
        catch (SocketException $ex){
            //print_r($ex); die;
            return false; 
        }
    }

    public function generateUsername($id, $prefix){
        
        if($id < 10){ 
            $sid = "00". $id; 
        }
        else if($id < 100) {
            $sid = "0". $id;
        }
        else {
            $sid = $id;
        }
        return $prefix . date("ymd") .  $sid;
    }
                          
     
   
 
}
