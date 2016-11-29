<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
/**
 * SupplierNotifications Controller
 *
 * @property \App\Model\Table\SupplierNotificationsTable $SupplierNotifications
 */
class SupplierNotificationsController extends AppController
{

	public function isAuthorized($user) {
	
		// The owner of an article can edit and delete it
		if (in_array ( $this->request->action, [
				
				'edit',				
				'view',
				'listnotifications',
				
				
		] )) {
			if (isset ( $user ['user_type'] ) && $user ['user_type'] == 3) {
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
    	
        $supplierNotifications = $this->paginate($this->SupplierNotifications);

        $this->set(compact('supplierNotifications'));
        $this->set('_serialize', ['supplierNotifications']);
    }

    /**
     * View method
     *
     * @param string|null $id Supplier Notification id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $supplierNotification_orderID = $this->SupplierNotifications->get($id, [
            'contain' => ['Suppliers.OrderProducts']
        ])->orderId;
        //print '<pre>';
        //print_r($supplierNotificationx);
        //die();
        $supplierNotification = $this->SupplierNotifications->get($id, [
        		'contain' => ['Suppliers.OrderProducts'=>['conditions'=>['order_id'=>$supplierNotification_orderID],'Suppliers.OrderProducts.Products','Suppliers.OrderProducts.Products.packageType']]
        ]);
        ///print_r($supplierNotification);
        //die();
        

        $this->set('supplierNotification', $supplierNotification);
        $this->set('_serialize', ['supplierNotification']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $supplierNotification = $this->SupplierNotifications->newEntity();
        if ($this->request->is('post')) {
            $supplierNotification = $this->SupplierNotifications->patchEntity($supplierNotification, $this->request->data);
            if ($this->SupplierNotifications->save($supplierNotification)) {
                $this->Flash->success(__('The supplier notification has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The supplier notification could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('supplierNotification'));
        $this->set('_serialize', ['supplierNotification']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Supplier Notification id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
    	$supplierNotification_orderID = $this->SupplierNotifications->get($id, [
    			'contain' => ['Suppliers.OrderProducts']
    	])->orderId;
    	
        $supplierNotification = $this->SupplierNotifications->get($id, [
            'contain' => ['Suppliers.OrderProducts'=>['conditions'=>['order_id'=>$supplierNotification_orderID],'Suppliers.OrderProducts.Products','Suppliers.OrderProducts.Products.packageType']]
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
        	
        	$data=$this->request->data;
        	$updatable_data=[];
        	foreach ($data['mystatus'] as $product_id=>$product_status){
        		$updatable_data[]=['order_id'=>$data['orderId'],'product_id'=>$product_id,'status_s'=>$product_status];
        	}     
        	$orderProductsModel=$this->loadModel('OrderProducts');
        	$entities = $orderProductsModel->newEntities($updatable_data);//update multiple rows same time using saveMeny
            if ($orderProductsModel->saveMany($entities)) {
                $this->Flash->success(__('The supplier notification has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The supplier notification could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('supplierNotification'));
        $this->set('_serialize', ['supplierNotification']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Supplier Notification id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $supplierNotification = $this->SupplierNotifications->get($id);
        if ($this->SupplierNotifications->delete($supplierNotification)) {
            $this->Flash->success(__('The supplier notification has been deleted.'));
        } else {
            $this->Flash->error(__('The supplier notification could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function listnotifications($type=""){
    	$status="";
    	if ($type=="pending" || $type=="new-pending"){
    		$status=0;
    	}elseif ($type=='available'){
    		$status=1;
    	}elseif ($type=='not-available'){
    		$status=2;
    	}elseif ($type=='ready'){
    		$status=3;
    	}elseif ($type=='delivery-hand-over'){
    		$status=4;
    	}elseif ($type=='canceled' || $type=="new-canceled"){
    		$status=9;
    	}
/*     	$myquery="SELECT DISTINCT op.product_id,prod.name,op.product_quantity,pt.type,sn.status_s,op.order_id,ps.supplier_id ".
    	  "FROM supplier_notifications sn ". 
    	  "JOIN product_suppliers ps ON sn.supplierId=ps.supplier_id ". 
    	  "JOIN order_products op ON ps.product_id=op.product_id ".     	  
    	  "JOIN products prod ON prod.id=op.product_id ".
    	  "JOIN package_type pt ON pt.id=prod.package ".
    	  "WHERE op.order_id=sn.orderId"; */
    	$user_id=$this->Auth->user('id');
    	$supplier_query=$this->SupplierNotifications->suppliers->find('all',['conditions'=>['user_id'=>$user_id]])->contain(['Users'])->first();
    	$supplier=$supplier_query->toArray();//get loged in supplier data
        /*
        $subQuery=$this->SupplierNotifications->find('list',['fields'=>['distinct op.product_id','pr.name','op.product_quantity','pt.type','status_s','op.order_id','ps.supplier_id']]) ->distinct(['op.product_id']) 
        ->join(['table'=>'product_suppliers','alias'=>'ps','type'=>'INNER','conditions'=>'supplierId=ps.supplier_id'])
        ->join(['table'=>'order_products','alias'=>'op','type'=>'INNER','conditions'=>'ps.product_id=op.product_id'])
        ->join(['table'=>'products','alias'=>'pr','type'=>'INNER','conditions'=>'pr.id=op.product_id'])
        ->join(['table'=>'package_type','alias'=>'pt','type'=>'INNER','conditions'=>'pt.id=pr.package']);
        
        $query=$this->SupplierNotifications->find('all')->join(['table'=>$subQuery,'alias'=>'sub','type'=>'INNER','conditions'=>'ps__supplier_id=supplierID']);
        echo $query;
    	*/
    	$conditions=['SupplierId'=>$supplier['id']];
    	if ($type!=""){
    		$conditions['status_s']=$status;
    	}
    	if ($type!="" &&($type=="new-pending" || $type=="new-canceled")){    		
    		$conditions['modified >']=new \DateTime('-24 hours');
    	}
    	
    	
        $supplierNotifications = $this->paginate($this->SupplierNotifications,['conditions'=>['SupplierNotifications.SupplierId'=>$supplier['id']],'contain'=>['Orders']]);
    	$this->set(compact('supplierNotifications'));
    	$this->set('_serialize', ['supplierNotifications']);
    }
}
