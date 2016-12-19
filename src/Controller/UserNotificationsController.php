<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserNotifications Controller
 *
 * @property \App\Model\Table\UserNotificationsTable $UserNotifications
 */
class UserNotificationsController extends AppController
{
	
	public function isAuthorized($user) {
	
		// The owner of an article can edit and delete it
		if (in_array ( $this->request->action, [
				'mynotifications',
				'updateSeen'
				
		] )) {
				
			if (isset ( $user ['user_type'] )) {
				return true;
			}
				
		}
	
		return parent::isAuthorized ( $user );
	}
	
	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('Notification');
		
	}
	
	public function mynotifications($userId)
	{
		if($userId==$this->Auth->user('id')){
		$userNotifications = $this->paginate($this->UserNotifications);
		if($userId!=""){
			$userNotifications = $this->paginate($this->UserNotifications,['conditions'=>['userId'=>$userId],'order'=>['created'=>'DESC']]);
		}
	
		$this->set(compact('userNotifications'));
		$this->set('_serialize', ['userNotifications']);
		}else{
			$this->Flash->error(__('You havent privilages to access other users notifications.'));
			return $this->redirect(['controller'=>'user-notifications','action' => 'mynotifications/'.$this->Auth->user('id')]);
			
		}
	}
	
	public function updateseen(){
		$this->request->allowMethod ( ['post'] );
		$id = $this->request->data( 'id' );
		//$id=16;
		$notification=$this->UserNotifications->get($id);
		$notification->seen=1;
		if($this->UserNotifications->save($notification)){
			
			$notificationCount=$this->Notification->getNotificationCount($this->Auth->user('id'));
		}
		$notificationCount=$this->Notification->getNotificationCount($this->Auth->user('id'));
		
		echo '{"notificationCount":'.$notificationCount.'}';
		
		
	}
	
	public function notificationDropdown($user_id){
		
			$notificationCount=$this->Notification->getNotificationCount($user_id);
			$notificationContent=$this->Notification->getLatestNotifications($user_id);
			$this->set('notificationCount', $notificationCount);
			$this->set('notificationContent', $notificationContent);
		
		
	}
	
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($userId="")
    {
        $userNotifications = $this->paginate($this->UserNotifications);
        if($userId!=""){
        	$userNotifications = $this->paginate($this->UserNotifications,['conditions'=>['userId'=>$userId]]);
        }

        $this->set(compact('userNotifications'));
        $this->set('_serialize', ['userNotifications']);
    }

    /**
     * View method
     *
     * @param string|null $id User Notification id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userNotification = $this->UserNotifications->get($id, [
            'contain' => []
        ]);

        $this->set('userNotification', $userNotification);
        $this->set('_serialize', ['userNotification']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userNotification = $this->UserNotifications->newEntity();
        if ($this->request->is('post')) {
            $userNotification = $this->UserNotifications->patchEntity($userNotification, $this->request->data);
            if ($this->UserNotifications->save($userNotification)) {
                $this->Flash->success(__('The user notification has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user notification could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('userNotification'));
        $this->set('_serialize', ['userNotification']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Notification id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userNotification = $this->UserNotifications->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userNotification = $this->UserNotifications->patchEntity($userNotification, $this->request->data);
            if ($this->UserNotifications->save($userNotification)) {
                $this->Flash->success(__('The user notification has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user notification could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('userNotification'));
        $this->set('_serialize', ['userNotification']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Notification id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userNotification = $this->UserNotifications->get($id);
        if ($this->UserNotifications->delete($userNotification)) {
            $this->Flash->success(__('The user notification has been deleted.'));
        } else {
            $this->Flash->error(__('The user notification could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    //get unread notification order by created date
    public function getNotificationCount(){
    	$user_id=$this->Auth->user('username');
    	// In a controller or table method.
		$query = $articles->find('all', ['conditions' => ['userId'=>$user_id,'seen'=>0]]);
		$number = $query->count();
		//return $number;
    	 
    }
}
