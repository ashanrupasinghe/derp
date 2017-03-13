<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Security;
use Cake\Mailer\Email;
use Cake\View\Helper\SessionHelper;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Text;


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
        $this->Auth->allow(['logout','register','forgotpassword','resetpasswordtoken']);
    }

    public function login()
    {
    	header('Content-type: application/json');
    	$return=[];
    	if (!$this->Auth->user()){
    		if ($this->request->is('post')) {
    			$user = $this->Auth->identify();
    			if ($user) {
    				
    				if ($user['status']==1){
    				$this->Auth->setUser($user);
    				$mobtoken = $this->__getMobToken();
    				$query = $this->Users->query();
    				$query->update()
    				->set(['mobtoken' => $mobtoken])
    				->where(['id' => $user['id']])
    				->execute();
    				
    				//return $this->redirect($this->Auth->redirectUrl());
    				$return['status']=200;
    				$return['token'] = $mobtoken;
    				$return['message']='login successful';
    				echo json_encode($return);
    				die();
    				
    				}else{
    					//$this->Flash->error(__('Your account has been disabled'));
    					$return['status']=400;
    					$return['message']='Account is disabled';
    					echo json_encode($return);
    					die();
    					
    				}
    			}else{
    			//$this->Flash->error(__('Invalid username or password, try again'));    				
    				$return['status']=400;
    				$return['message']='Invalid username or password';    
    				echo json_encode($return);
    				die();
    			}    			
    			
    		}else {
            $return['status'] = 500;
            $return['message'] = "Unauthorized login";
            echo json_encode($return);
            die();
        	}
        	
    		
    	}
    	else{    		
    		//return $this->redirect(['controller' => 'Users', 'action' => 'userpage']);
    		$return['status']=200;
    		$return['message']='already logedin';
    		echo json_encode($return);
    		die();
    		
    	}
    	
        
        
    }

    public function logout()
    {
    	header('Content-type: application/json');
    	$this->Auth->logout();
    	$return['status']=200;
    	$return['message']='logout sucess';
    	echo json_encode($return);
    	die();
        //return $this->redirect($this->Auth->logout());
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
    	header('Content-type: application/json');
    	$return=[];
    	$user = $this->Users->newEntity();
    	if ($this->request->is('post')) {
    		$data=$this->request->data;
    		
    		$user_data=[
    				'username'=>$data['email'],
    				'user_type'=>5,
    				'password'=>$data['password'],
    				'confirm_password'=>$data['confirm_password'],
    				'status'=>1,
    				'formType'=>$data['formType']
    				
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
    				//$this->Flash->success(__('The user has been saved.'));
    				// Retrieve user from DB
    				$authUser = $this->Users->get($user->id)->toArray();
    				
    				// Log user in using Auth
    				$this->Auth->setUser($authUser);
    				
    				$mobtoken = $this->__getMobToken();
    				$query = $this->Users->query();
    				$query->update()
    				->set(['mobtoken' => $mobtoken])
    				->where(['id' => $user['id']])
    				->execute();
    				
    				// Redirect user
    				//return $this->redirect(['controller' => 'Users', 'action' => 'userpage']);
    				$return['status']=200;
    				$return['token'] = $mobtoken;
    				$return['message']='register and login successful';
    				echo json_encode($return);
    				die();
    			}
    			else {
    				//$this->Flash->error(__('Ops, Something went wrong'));
    				$return->status = 104;
                    $return->message = "Unable to save customer. Try again.";
                    echo json_encode($return);
                    die();
    			}
    
    			//return $this->redirect(['action' => 'register']);
    		} else {
    			//$this->Flash->error(__('The user could not be saved. Please, try again.'));
    			$return['status'] = 104;
    			$return['message'] = "Unable to save user. Try again.";
    			echo json_encode($return);
    			die();
    		}
    		
    	} /* else{
    		$return['status'] = 500;
    		$return['message'] = "Unauthorized Request";
    		echo json_encode($return);
    		die();
    	}  */
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
    	header('Content-type: application/json');
    	$return=[];
    	if (!empty($this->request->data)) {  
    		$user_name=$this->request->data('username');
    		$user = $this->Users->findByUsername($user_name)->first();   
    		if (empty($user)) {    			
    			//$this->Flash->error(__('Sorry, the username entered was not found.'));
    			//$this->redirect('/users/forgotpassword');
    			$return['status']=400;
    			$return['message']='The email address not found';
    			echo json_encode($return);
    			die();
    		} else {    			
    			$user = $this->__generatePasswordToken($user);    			
    			    			
    			if ($this->Users->save($user) && $this->__sendForgotPasswordEmail($user->id)) {    				
    				//$this->Flash->success(__('Password reset instructions have been sent to your email address. You have 24 hours to complete the request.'));
    				//$this->redirect('/users/login');
    				$return['status']=200;    				
    				$return['message']='Password reset instructions have been sent to your email address. You have 24 hours to complete the request.';
    				echo json_encode($return);
    				die();
    			}else{
    				//$this->Flash->error(__('Sorry, Something went wrong please try again'));
    				$return['status']=400;
    				$return['message']='Sorry, Something went wrong please try again';
    				echo json_encode($return);
    				die();
    			}
    		}
    		
    	} else{
    		$return['status'] = 500;
    		$return['message'] = "Unauthorized Request";
    		echo json_encode($return);
    		die();
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
            $User = $this->Users->get($id);
            $email = new Email('default');
            $email ->to($User->username)
            ->replyTo('donotreply@example.com')
            ->subject('Password Reset Request - DO NOT REPLY')
            ->from('donotreply@example.com')
            ->template('reset_password_request')  
            ->emailFormat('html')
            ->set('User', $User);
            try {
            if($email->send()){
            	return true;
            }else{
            	return false;
            }
            } catch ( Exception $e ) {
            	$this->Flash->error(__('Sorry, Error in sending email please try again'));
            }
            
            
            
            
    		
    	}
    	return false;
    }
    
    
    /**
     * Allow user to reset password if $token is valid.
     * @return
     */
    function resetpasswordtoken($reset_password_token = null) {  
    	header('Content-type: application/json');
    	$return=[];
     	if (empty($this->request->data)) {    		    		
    		$data= $this->Users->findByResetPasswordToken($reset_password_token)->first();
    		
    		if (!empty($data->reset_password_token) && !empty($data->token_created_at) && $this->__validToken($data->token_created_at)) {
    					
    			$data->id = null;    			
    			 $this->request->session()->write('pwreset.reset_password_token', $reset_password_token);
    			 $return['status']=200;
    			 $return['message']='valid reset request';
    			 $return['pw_reset_token']=$reset_password_token;
    			 echo json_encode($return);
    			 die();
    					 

    		} else {    					
    					//$this->Flash->error(__('The password reset request has either expired or is invalid.'));
    					//$this->redirect('/users/login');
    					$return['status']=400;
    					$return['message']='The password reset request has either expired or is invalid.';    					
    					echo json_encode($return);
    					die(); 
    		}
    		
    		
    	} else {
    		
    		
    		if ($this->request->data('reset_password_token') != $this->request->session()->read('pwreset.reset_password_token')) {
    			//$this->Flash->error(__('The password reset request has either expired or is invalid.'));
    			//$this->redirect('/users/login');
    			$return['status']=400;
    			$return['message']='The password reset request has either expired or is invalid.';
    			echo json_encode($return);
    			die();
    		}
    		$user = $this->Users->findByResetPasswordToken($this->request->data('reset_password_token'))->first();
    		$user = $this->Users->patchEntity($user, $this->request->data);
    		//$this->User->id = $user['User']['id'];
    		
    		if ($this->Users->save($user)) {   
    			
    			$user->reset_password_token = null;
    			$user->token_created_at = null;
    			
    			if ($this->Users->save($user) && $this->__sendPasswordChangedEmail($user->id)) {    				
    				$this->request->session()->delete('pwreset.reset_password_token');
    				//$this->Flash->success(__('Your password was changed successfully. Please login to continue.'));
    				//$this->redirect('/users/login');
    				$return['status']=200;
    				$return['message']='Your password was changed successfully. Please login to continue.';
    				echo json_encode($return);
    				die();
    			}
    		}else{
    			//$this->Flash->error(__('Somthing went wrong please try again'));
    			$token=$this->request->session()->read('pwreset.reset_password_token');
    			//$this->redirect('/users/resetpasswordtoken/'.$token);
    			$return['status']=400;
    			$return['message']='New password is not saved, try again';
    			$return['pw_reset_token']=$token;
    			echo json_encode($return);
    			die();
    		}
    		
    		
    	} 
    	
    	$this->set ( 'reset_password_token',$reset_password_token );
    	
    }
    
    /**
     * Validate token created at time.
     * @param String $token_created_at
     * @return Boolean
     */
    function __validToken($token_created_at) {
    	$expired = strtotime($token_created_at) + 86400;
    	$time = strtotime("now");
    	if ($time < $expired) {
    		return true;
    	}
    	return false;
    } 
    /**
     * Notifies user their password has changed.
     * @param $id
     * @return
     */    
    function __sendPasswordChangedEmail($id = null) {
    	if (!empty($id)) {
    		$User = $this->Users->get($id);
    		$email = new Email('default');
    		$email ->to($User->username)
    		->replyTo('donotreply@example.com')
    		->subject('Password Changed - DO NOT REPLY')
    		->from('donotreply@example.com')
    		->template('password_reset_success')
    		->emailFormat('html')
    		->set('User', $User);
    		
    	 try {
            if($email->send()){
            	return true;
            }else{
            	return false;
            }
            } catch ( Exception $e ) {
            	$this->Flash->error(__('Sorry, Error in sending email please try again'));
            }
    	}
    	return false;
    }
    
    function __getMobToken(){
    	$hasher = new DefaultPasswordHasher();
    	$token=$hasher->hash(sha1(Text::uuid()));
    	return $token;
    }
    
}
//https://github.com/hunzinker/CakePHP-Auth-Forgot-Password/blob/master/controllers/users_controller.php