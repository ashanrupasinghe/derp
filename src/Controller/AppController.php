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
use Cake\I18n\Time;


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
//    public $components = array(
//        'Flash',
//        'Auth' => array(
//            'loginRedirect' => array(
//                'controller' => 'users',
//                'action' => 'dashboard'
//            ),
//            'logoutRedirect' => array(
//                'controller' => 'users',
//                'action' => 'login',
//                'login'
//            ),
//            'authenticate' => array(
//                'Form'
//            )
//        )
//    );


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

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Notification');
		//$this->loadComponent('Auth');
        $this->loadComponent('Auth',['authorize' => ['Controller']]);
		$this->set('authUser', $this->Auth->user());//set a variable for view, for check userloged in or not
		$this->set('userLevel', $this->Auth->user('user_type'));
		$this->set('userName', $this->Auth->user('username'));
		$this->set('userId', $this->Auth->user('id'));
		$now=$current__date_time=Time::now();//now
		$current__date=$current__date_time->format('Y-m-d');
		$current__time=$current__date_time->format('H:i:s');
		$this->set('dateTimeNow',$now);
		$this->set('timeNow',$current__time);
		$this->set('dateNow',$current__date);
    }
    
    public function beforeFilter(\Cake\Event\Event $event) {
//       // $this->Auth->allow('login');
//echo("ajshahsjh");
			//$notify=$this->loadModel('UserNotifications');
    		//$this->set('UserNotificationCount', $notify->getNotificationCount());
    		if($this->Auth->user()){
    		$notificationCount=$this->Notification->getNotificationCount($this->Auth->user('id'));
    		$notificationContent=$this->Notification->getLatestNotifications($this->Auth->user('id'));
    	 	$this->set('notificationCount', $notificationCount);    	
    		$this->set('notificationContent', $notificationContent);
    		
    		}
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
    
    public function isAuthorized($user)
    {
    	
    	
    	// Admin can access every action
    	if (isset($user['user_type']) && $user['user_type'] == 1) {    		
    		return true;
    	}
    
    	// Default deny
    	return false;
    }
}
