<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Security;
use Cake\Mailer\Email;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
	
	public function isAuthorized($user)
	{
	
	
		// The owner of an article can edit and delete it
		if (in_array($this->request->action, ['userpage'])) {
				
			if ($this->Auth->user()) {
				return true;
			}
		}
	
		return parent::isAuthorized($user);
	}
	
	
	/*
	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		// Allow users to register and logout.
		// You should not add the "login" action to allow list. Doing so would
		// cause problems with normal functioning of AuthComponent.
		$this->Auth->allow(['add', 'logout']);
	}*/

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Callcenter', 'Delivery', 'Suppliers']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['logout','register','forgotpassword']);
    }

    public function login()
    {
    	if (!$this->Auth->user()){
    		if ($this->request->is('post')) {
    			$user = $this->Auth->identify();
    			if ($user) {
    				if ($user['status']==1){
    				$this->Auth->setUser($user);
    				return $this->redirect($this->Auth->redirectUrl());
    				}else{
    					$this->Flash->error(__('Your account has been disabled'));
    				}
    			}else{
    			$this->Flash->error(__('Invalid username or password, try again'));
    			}
    		}
    	}
    	else{
    		
    		return $this->redirect(['controller' => 'Users', 'action' => 'userpage']);
    		
    	}
        
        
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
    public function userpage(){
    	if ($this->Auth->user()){
    		$userlevel = $this->Auth->user ( 'user_type' );
    		if($userlevel==1){
    			return $this->redirect(['controller' => 'Customers', 'action' => 'search']);
    		}
    		if($userlevel==2){
    			return $this->redirect(['controller' => 'Customers', 'action' => 'search']);
    		}
    		if($userlevel==3){
    			$user_id=$this->Auth->user('id');
    			return $this->redirect(['controller' => 'SupplierNotifications', 'action' => 'schedule']);
    		}
    		if ($userlevel==4){
    			return $this->redirect(['controller' => 'DeliveryNotifications', 'action' => 'listSuppliervice']);
    		}
    		if ($userlevel==5){
    			
    			return $this->redirect(['controller' => 'Front', 'action' => 'index']);
    		}
    	}else {
    		return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    	}
    	 
    	 
    }
    
/*register user*/
    public function register()
    {
    	$user = $this->Users->newEntity();
    	if ($this->request->is('post')) {
    		$data=$this->request->data;
    		
    		$user_data=[
    				'username'=>$data['email'],
    				'user_type'=>5,
    				'password'=>$data['password'],
    				'confirm_password'=>$data['confirm_password'],
    				'status'=>1,
    				'form-type'=>$data['form-type']
    		];
    		//$customer_data[];
    		$data['status']=1;
    		
    		$user = $this->Users->patchEntity($user, $user_data);
    		//print_r($user);
    		//die($user->id);
    		if ($this->Users->save($user)) {
    			$data['user_id']=$user->id;
    			$customer_model=$this->loadModel('customers');
    			$customer=$customer_model->newEntity(); 
    			$customer= $customer_model->patchEntity($customer, $data);
    			
    			if ($customer_model->save($customer)){
    				$this->Flash->success(__('The user has been saved.'));
    				// Retrieve user from DB
    				$authUser = $this->Users->get($user->id)->toArray();
    				
    				// Log user in using Auth
    				$this->Auth->setUser($authUser);
    				
    				// Redirect user
    				return $this->redirect(['controller' => 'Users', 'action' => 'userpage']);
    			}
    			else {
    				$this->Flash->error(__('Ops, Something went wrong'));
    			}
    
    			return $this->redirect(['action' => 'register']);
    		} else {
    			$this->Flash->error(__('The user could not be saved. Please, try again.'));
    		}
    	}
    	$this->set(compact('user'));
    	$this->set('_serialize', ['user']);
    	$cityModel=$this->loadModel('city');
    	$cities = $cityModel->find ()->select ( [
    			'cid',
    			'cname'
    	] )->formatResults ( function ($results) {
    		/* @var $results \Cake\Datasource\ResultSetInterface|\Cake\Collection\CollectionInterface */
    		return $results->combine ( 'cid', function ($row) {
    			return $row ['cname'];
    		} );
    	} );
    	$this->set ( compact ( 'cities' ) );
    }  

    /**
     * Allow a user to request a password reset.
     * @return
     */
    function forgotpassword() {
    	if (!empty($this->request->data)) {  
    		$user_name=$this->request->data('username');
    		$user = $this->Users->findByUsername($user_name)->first();   
    		if (empty($user)) {    			
    			$this->Flash->error(__('Sorry, the username entered was not found.'));
    			$this->redirect('/users/forgotpassword');
    		} else {    			
    			$user = $this->__generatePasswordToken($user);    			
    			$this->Users->save($user);    			
    			die();
    			$this->Users->save($user);
    			if ($this->Users->save($user) && $this->__sendForgotPasswordEmail($user['User']['id'])) {
    				$this->Session->setflash('Password reset instructions have been sent to your email address.
						You have 24 hours to complete the request.');
    				$this->redirect('/users/login');
    			}
    		}
    	}
    }
    
    /**
     * Generate a unique hash / token.
     * @param Object User
     * @return Object User
     */
    function __generatePasswordToken($user) {
    	if (empty($user)) {
    		return null;
    	}
    	// Generate a random string 100 chars in length.
    	$token = "";
    	for ($i = 0; $i < 100; $i++) {
    		$d = rand(1, 100000) % 2;
    		$d ? $token .= chr(rand(33,79)) : $token .= chr(rand(80,126));
    	}
    	(rand(1, 100000) % 2) ? $token = strrev($token) : $token = $token;
    	// Generate hash of random string
    	$hash = Security::hash($token, 'sha256', true);;
    	for ($i = 0; $i < 20; $i++) {
    		$hash = Security::hash($hash, 'sha256', true);
    	}
    	
    	$user->reset_password_token = $hash;
    	$user->token_created_at  = date('Y-m-d H:i:s');
    	return $user;
    }
    
    /**
     * Sends password reset email to user's email address.
     * @param $id
     * @return
     */
    function __sendForgotPasswordEmail($id = null) {
    	if (!empty($id)) {
    		$this->User->id = $id;
    		$User = $this->User->read();    		
    		$this->Email->to 		= $User['User']['email'];
    		$this->Email->subject 	= 'Password Reset Request - DO NOT REPLY';
    		$this->Email->replyTo 	= 'do-not-reply@example.com';
    		$this->Email->from 		= 'Do Not Reply <do-not-reply@example.com>';
    		$this->Email->template 	= 'reset_password_request';
    		$this->Email->sendAs 	= 'both';
    		$this->set('User', $User);
    		$this->Email->send();
    		return true;
    	}
    	return false;
    }
}
