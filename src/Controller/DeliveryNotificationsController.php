<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
/**
 * DeliveryNotifications Controller
 *
 * @property \App\Model\Table\DeliveryNotificationsTable $DeliveryNotifications
 */
class DeliveryNotificationsController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('Notification');
	
	}
	
	public function isAuthorized($user) {
	
		// The owner of an article can edit and delete it
		if (in_array ( $this->request->action, [
	
				'edit',
				'view',
				'listnotifications',
				
	
	
		] )) {
			if (isset ( $user ['user_type'] ) && $user ['user_type'] == 4) {
				return true;
			}
			/* $supplier_query=$this->SupplierNotifications->suppliers->find('all',['conditions'=>['user_id'=>$user['id']]])->contain(['Users'])->first();
				$supplier=$supplier_query->toArray();
				if ($this->SupplierNotifications->isAssigned($supplier['id'])) {
				return true;
				} */
		}
	
		return parent::isAuthorized ( $user );
	}

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $deliveryNotifications = $this->paginate($this->DeliveryNotifications);

        $this->set(compact('deliveryNotifications'));
        $this->set('_serialize', ['deliveryNotifications']);
    }

    /**
     * View method
     *
     * @param string|null $id Delivery Notification id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deliveryNotification = $this->DeliveryNotifications->get($id, [
            'contain' => []
        ]);
        $customer=$this->DeliveryNotifications->get($id,['contain'=>['Orders','Orders.customers','Orders.city']]);
        //$suppliers=$this->DeliveryNotifications->get($id,['contain'=>['Orders','Orders.SupplierNotifications','Orders.SupplierNotifications.Suppliers','Orders.SupplierNotifications.Suppliers.city']]);
        $suppliers=$this->DeliveryNotifications->get($id,['contain'=>['Orders.OrderProducts','Orders.OrderProducts.Products','Orders.OrderProducts.Products.packageType','Orders.OrderProducts.Suppliers','Orders.OrderProducts.Suppliers.city']]);
        $suppliers=$suppliers->toArray();
        
        /* print '<pre>';
        print_r($suppliers);
        die(); */
        
        $this->set(compact('suppliers','customer'));
        $this->set('deliveryNotification', $deliveryNotification);
        $this->set('_serialize', ['deliveryNotification']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deliveryNotification = $this->DeliveryNotifications->newEntity();
        if ($this->request->is('post')) {
            $deliveryNotification = $this->DeliveryNotifications->patchEntity($deliveryNotification, $this->request->data);
            if ($this->DeliveryNotifications->save($deliveryNotification)) {
                $this->Flash->success(__('The delivery notification has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The delivery notification could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('deliveryNotification'));
        $this->set('_serialize', ['deliveryNotification']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Delivery Notification id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deliveryNotification = $this->DeliveryNotifications->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
        	
        	$data=$this->request->data();
        	 /* print '<pre>';
        	print_r($data); */
        	//die();
        	
        	$orderProductsModel=$this->loadModel('OrderProducts');
        	$mystatus_update=[]; //status_d, orderproducts   
        	$count_took=0;  //tooked products
        	$orderstatus=0;  //order table status	
        	for($i=0;$i<sizeof($data['mystatus']);$i++){
        		if($data['mystatus'][$i]==1){
        			$count_took++;
        		}
        		
        		
        		$current_status=$orderProductsModel->get([$data['orderId'],$data['productid'][$i]],['fields'=>['status_d']])->toArray();//$current_status['status_s']
        		//print_r($current_status);
        		 if($current_status['status_d']==$data['mystatus'][$i]){
        			continue ;//if current tatus equals to new status return
        		} 
        		
        		
        		//$mystatus_update[$i]=['id'=>$data['supid'][$i],'status_d'=>$data['mystatus'][$i]];
        		$mystatus_update[]=['order_id'=>$data['orderId'],'product_id'=>$data['productid'][$i],'status_d'=>$data['mystatus'][$i]];
        		/*Notification function xxx yy z*/
        		$this->Notification->setNotification('','',$data['mystatus'][$i],$data['orderId'],$data['productid'][$i],'','');//sent notification
        	}
        	
       /*  print '<pre>';
        	print_r($mystatus_update);
        	die();  */
        	//echo $data['status'];
        	if ($count_took==sizeof($data['mystatus'])){
        		if ($data['Order_Status']==1){
        		$data['Order_Status']=4;//check
        		$orderstatus=4;	
        		}
        		elseif ($data['Order_Status']==5){
        			$orderstatus=5;
        		}
        		
        	}
         /* 	 print '<pre>';
        	echo $data['status'];
        	print_r($mystatus_update);
        	echo $count_took;
        	echo $orderstatus;
        	
        	echo 'xxxx'.$orderstatus;
        	die(); */
        	
            //$deliveryNotification = $this->DeliveryNotifications->patchEntity($deliveryNotification, $data);
            //if ($this->DeliveryNotifications->save($deliveryNotification)) {
        	if(sizeof($mystatus_update)==0){
        		
        		$ordermodel=$this->loadModel('Orders');
        		$current_order_status=$ordermodel->get($data['orderId'],['fields'=>['status']])->toArray();//$current_status['status_s']//current order status
        		/* print_r($orderstatus.'||'.$current_order_status['status'].'||'.$orderstatus);
        		print '<pre>';print_r($data);
        		die(); */
        		
        		if ($current_order_status['status']!=$data['Order_Status']){
        			/* print '<pre>'; */
        			//change order table
        			 
        			$order=$ordermodel->get($data['orderId']);
        			//print_r($order);
        			/* echo $data['orderId']; */
        			$order->status=$data['Order_Status'];
        			$result=$ordermodel->save($order);
        			/* echo $result;
        			 die(); */
        			
        			/*Notification function xxx yy z*/
        			$this->Notification->setNotification($data['Order_Status'],'','',$data['orderId'],'','','');//sent notification
        		
        			if($result){
        				$this->Flash->success(__('The delivery notification has been saved.'));
        				 
        				return $this->redirect(['action' => 'index']);
        			}
        		}
        		
        		$this->Flash->error(__('The delivery notification could not be saved. Please, change dropdown values.'));
        	}else{
        	$entities = $orderProductsModel->newEntities($mystatus_update);//update multiple rows same time using saveMeny
        	if ($orderProductsModel->saveMany($entities)) {
            	
            	//$suppliers_noti_model=$this->loadModel('SupplierNotifications');
            	//$update=$suppliers_noti_model->save($mystatus_update);
            	//foreach ($mystatus_update as $mystatus){
            		//$snot=$suppliers_noti_model->get($mystatus['id']);
            		//$snot->status_d=$mystatus['status_d'];
            		//$suppliers_noti_model->save($snot);
            	//}
            	/* echo $orderstatus;
            	echo $data['orderId'];
            	//die(); */
        		$ordermodel=$this->loadModel('Orders');
            	$current_order_status=$ordermodel->get($data['orderId'],['fields'=>['status']])->toArray();//$current_status['status_s']//current order status
            	if ($orderstatus!=0 && $current_order_status['status']!=$orderstatus){
            		/* print '<pre>'; */
            		//change order table
            		
            		$order=$ordermodel->get($data['orderId']);
            		//print_r($order);
            		/* echo $data['orderId']; */
            		$order->status=$orderstatus;
            		$result=$ordermodel->save($order);
            		/* echo $result;
            		die(); */
            		
            		/*Notification function xxx yy z*/
            		$this->Notification->setNotification($orderstatus,'','',$data['orderId'],'','','');//sent notification
            	}
            	//$suppliers_noti_model->get($primaryKey);
            	
                $this->Flash->success(__('The delivery notification has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The delivery notification could not be saved. Please, try again.'));
            }
            
        }
        }
        $customer=$this->DeliveryNotifications->get($id,['contain'=>['Orders','Orders.customers','Orders.city']]);
       // $suppliers=$this->DeliveryNotifications->get($id,['contain'=>['Orders','Orders.SupplierNotifications','Orders.SupplierNotifications.Suppliers','Orders.SupplierNotifications.Suppliers.city']]);
        $suppliers=$this->DeliveryNotifications->get($id,['contain'=>['Orders.OrderProducts','Orders.OrderProducts.Products','Orders.OrderProducts.Products.packageType','Orders.OrderProducts.Suppliers','Orders.OrderProducts.Suppliers.city']]);
        $suppliers=$suppliers->toArray();
        $this->set(compact('deliveryNotification','customer','suppliers'));
         
         
        $this->set('_serialize', ['deliveryNotification']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Delivery Notification id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deliveryNotification = $this->DeliveryNotifications->get($id);
        if ($this->DeliveryNotifications->delete($deliveryNotification)) {
            $this->Flash->success(__('The delivery notification has been deleted.'));
        } else {
            $this->Flash->error(__('The delivery notification could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function listnotifications($type=""){  
    	$status="";
    	if ($type=="pending" || $type=="new-pending" || $type=='ready'){
    		$status=0;
    	}elseif ($type=='took-all'){
    		$status=1;
    	}elseif ($type=='delivered'){
    		$status=2;
    	}elseif ($type=='canceled' || $type=="new-canceled"){
    		$status=9;
    	}
    	/*
SELECT dn.*,count(*) noOfProduct,sum(case when sn.status_s = 3 then 1 else 0 end) ready, sum(case when sn.status_s = 4 then 1 else 0 end) handovered FROM delivery_notifications dn JOIN supplier_notifications sn ON dn.orderId=sn.orderId WHERE dn.deliveryId=4 group by sn.orderId 
    	 * */
    	$user_id=$this->Auth->user('id');
    	$delivery_query=$this->DeliveryNotifications->delivery->find('all',['conditions'=>['user_id'=>$user_id]])->contain(['Users'])->first();
    	$delivery=$delivery_query->toArray();
    	//
    	$where="";
    	
    	if ($type=="ready"){
    		$where=" WHERE t.noOfProduct=t.ready";
    		
    	}
    	/* $query="SELECT t.* FROM (SELECT dn.*,count(*) noOfProduct,".
    			"sum(case when sn.status_s = 3 then 1 else 0 end) ready,".
    			" sum(case when sn.status_s = 4 then 1 else 0 end) handovered".
    			" FROM delivery_notifications dn".
    			" JOIN supplier_notifications sn ON dn.orderId=sn.orderId".
    			" WHERE dn.deliveryId=".$delivery['id'].
    			" group by sn.orderId) as t".
    			$where; */
    	
    	$query="SELECT t.* FROM (SELECT dn.*,count(*) noOfProduct,".
    			"sum(case when op.status_s = 3 then 1 else 0 end) ready,".
    			" sum(case when op.status_s = 4 then 1 else 0 end) handovered".
    			" FROM delivery_notifications dn".
    			" JOIN order_products op ON dn.orderId=op.order_id".
    			" WHERE dn.deliveryId=".$delivery['id'].
    			" group by op.order_id) as t".
    			$where;
    	
    	
    	$connection = ConnectionManager::get('default');
    	$results = $connection->execute($query)->fetchAll('assoc');
    	
    	$counted_data=[];
    	//print '<pre>';
    	foreach ($results as $result){    		
    		$counted_data[$result['orderId']]=$result;
    	}
    	
    	
     	//print '<pre>';
    	//echo $query;
    	//print_r($counted_data);
    	//echo $counted_data[56]['noOfProduct'].'<br>';
    	//echo $counted_data[56]['ready'];
    	//die(); 
    	$conditions=['deliveryId'=>$delivery['id']];
    	
    	if ($type!=""){
    		$conditions['status']=$status;
    	}
    	if ($type=="new-pending" || $type=="new-canceled"){
    		$conditions['modified >']=new \DateTime('-24 hours');
    	}    	
    	if ($type=="ready"){
    		$idlist=array_column($results,'id');//list of notification id readyProduct=no of products
    		
    		if (!empty($idlist)){
    		$conditions['id IN']=$idlist;
    		}else {
    			$conditions['id IN']=[0];//privent error,if empty idlist array, return an sql error
    		}
    	}
    	
    	//print_r($conditions);
    	
    	
    	//print '<pre>';
    	//print_r( $counted_data);
    	//die();
    	//$deliveryNotifications = $this->paginate($this->DeliveryNotifications,['conditions'=>['deliveryId'=>$delivery['id']]]);
    	$deliveryNotifications = $this->paginate($this->DeliveryNotifications,['conditions'=>['DeliveryNotifications.deliveryId'=>$delivery['id']],'contain'=>['Orders'],'order' => ['DeliveryNotifications.created' => 'DESC']]);
    	/* print '<pre>';
    	print_r($deliveryNotifications);
    	die(); */
        $this->set(compact('deliveryNotifications','counted_data'));
        $this->set('_serialize', ['deliveryNotifications']);
    }
}
