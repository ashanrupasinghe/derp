<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\SupplierNotification;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 */
class OrdersController extends AppController {
	
	public function isAuthorized($user) {
		
		// The owner of an article can edit and delete it
		if (in_array ( $this->request->action, [ 
				'add',
				'edit',
				'delete',
				'view',
				'index',
				'productsuppliersbyid',
				'singlecal',
				'countSubTotal',
				'processdata'
		] )) {
			
			if (isset ( $user ['user_type'] ) && $user ['user_type'] == 2) {
				return true;
			}
		}
		
		return parent::isAuthorized ( $user );
	}
	
	/**
	 * Index method
	 *
	 * @return \Cake\Network\Response|null
	 */
	public function index() {
		$orders = $this->paginate ( $this->Orders );
		$callcenter_query=$this->Orders->Callcenter->find('list',['keyField'=>'id','valueField'=>'users.username'])->select(['id','users.username'])
							->join ( [
				'table' => 'users',
				'alias' => 'users',
				'type' => 'INNER',	
				'conditions' => 'user_id = users.id'
		] );
							$callcenters=$callcenter_query->toArray();

							$this->set('callcenters',$callcenters);	
													
		$delivery_query=$this->Orders->Delivery->find('list',['keyField'=>'id','valueField'=>'users.username'])->select(['id','users.username'])
							->join ( [
				'table' => 'users',
				'alias' => 'users',
				'type' => 'INNER',	
				'conditions' => 'user_id = users.id'
		] );
							$deliveries=$delivery_query->toArray();

							$this->set('deliveries',$deliveries);	
						
		
		$cities_query=$this->Orders->City->find('list',['keyField'=>'cid','valueField'=>'cname']);
		$city=$cities_query->toArray();
		$this->set('cities',$city);

		$this->set ( compact ( 'orders' ) );
		$this->set ( '_serialize', [ 
				'orders' 
		] );
	}
	
	/**
	 * View method
	 *
	 * @param string|null $id
	 *        	Order id.
	 * @return \Cake\Network\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null) {
		$order = $this->Orders->get ( $id, [ 
				'contain' => [ 
						'OrderProducts' 
				] 
		] );
		
		$this->set ( 'order', $order );
		$this->set ( '_serialize', [ 
				'order' 
		] );
	}
	
	/**
	 * Add method
	 *
	 * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
	 */
	public function add() {		
		$session = $this->request->session ();
		$client_id = $session->read ( 'Config.clientid' );		
		$order = $this->Orders->newEntity ();
		$order_data=$this->request->data();
		
		if ($this->request->is ( 'post' )) {
			$data=$this->processdata($order_data);//rearrange data sets with count total
			$order = $this->Orders->patchEntity ( $order, $data );	
			$saving=$this->Orders->save ( $order );				
				
			if ($saving) {				
				//$session->destroy('Config.clientid');
				
				//delevery notification
				//$dilivery_id=$order->deliveryId;
				$dilivery_notification=['deliveryId'=>$order->deliveryId,'notificationText'=>'del nofify','sentFrom'=>1,'orderId'=>$order->id];
				//create array for order_pruducts table
				$order_products=[];
				//supplier noification
				$supplier_notification=[];
				
				  for($i=0;$i<sizeof($order_data['product_name']);$i++){
				 	//order_pruducts table
					$order_products[$i]=['order_id'=>$order->id,'product_id'=>$order_data['product_name'][$i],'product_quantity'=>$order_data['product_quantity'][$i]];
					$supplier_notification[$i]=['supplierId'=>$order_data['product_supplier'][$i],'notificationText'=>'notify','sentFrom'=>1,'orderId'=>$order->id];					
				}  
				
				
				//print_r($saving);
				
				
				
				$order_product_entities = $this->Orders->OrderProducts->newEntities($order_products);
				$order_product_result = $this->Orders->OrderProducts->saveMany($order_product_entities);
				
				
				
				$supplier_notification_entites=$this->Orders->SupplierNotifications->newEntities($supplier_notification);
				$supplier_notification_result=$this->Orders->SupplierNotifications->saveMany($supplier_notification_entites);
				
				$dlilevery_notification_entity=$this->Orders->DeliveryNotifications->newEntity($dilivery_notification);
				$dilivery_notification_result=$this->Orders->DeliveryNotifications->save($dlilevery_notification_entity);
				
				
				
				
				$this->Flash->success ( __ ( 'The order has been saved.' ) );
				
				return $this->redirect ( [ 
						'action' => 'index' 
				] );
			} else {
				$this->Flash->error ( __ ( 'The order could not be saved. Please, try again.' ) );
			}
		}
		
		$this->set ( compact ( 'order' ) );
		$this->set ( '_serialize', [ 
				'order' 
		] );
		$this->set ( 'clientid', $client_id );
		$client_data_query=$this->Orders->Customers->find('all',['conditions'=>['id'=>$client_id]])->select(['address','city'])->first();
		$client_data=$client_data_query->toArray();
		$this->set('client_data',$client_data);
		$callcenters = $this->Orders->Callcenter->find ()->select ( [ 
				'id',
				'firstName',
				'lastName' 
		] )->formatResults ( function ($results) {
			/* @var $results \Cake\Datasource\ResultSetInterface|\Cake\Collection\CollectionInterface */
			return $results->combine ( 'id', function ($row) {
				return $row ['firstName'] . ' ' . $row ['lastName'];
			} );
		} );
		$this->set ( compact ( 'callcenters' ) );
		
		$deliveries = $this->Orders->Delivery->find ()->select ( [ 
				'id',
				'firstName',
				'lastName' 
		] )->formatResults ( function ($results) {
			/* @var $results \Cake\Datasource\ResultSetInterface|\Cake\Collection\CollectionInterface */
			return $results->combine ( 'id', function ($row) {
				return $row ['firstName'] . ' ' . $row ['lastName'];
			} );
		} );
		$this->set ( compact ( 'deliveries' ) );
		
		
		$callcenterId = $this->Auth->user ( 'id' ); // get from session values
		$usermodel = $this->loadModel ( 'Callcenter' );
		$callcenterId = $usermodel->getcallcenterid ( $callcenterId );
		$this->set ( compact ( 'callcenterId' ) );
		
		$productmodel=$this->loadModel('Products');
		$products=$productmodel->find('list',['fields'=>['id','name']])->distinct(['name']);
		$this->set ( 'products',$products );
		
		
		$cities = $this->Orders->City->find ()->select ( [ 
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
	 * Edit method
	 *
	 * @param string|null $id
	 *        	Order id.
	 * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null) {
		
		$order = $this->Orders->get ( $id, [ 
				'contain' => [ ] 
		] );
		if ($this->request->is ( [ 
				'patch',
				'post',
				'put' 
		] )) {
			$order_data=$this->request->data();//submited data
			$no_of_old_products=$order_data['editorder'];//number of product oder before
			if(sizeof($order_data['product_name'])>$no_of_old_products){
				$data=$this->processdata($order_data);//rearrange data sets with count total
				$order = $this->Orders->patchEntity ( $order, $data );
				//$saving=$this->Orders->save ( $order );
			}
			/* print '<pre>';
			print_r($this->request->data);
			echo $no_of_old_products;
			die();  */
			$order = $this->Orders->patchEntity ( $order, $this->request->data );
			if ($this->Orders->save ( $order )) {
				
				
				if(sizeof($order_data['product_name'])>$no_of_old_products){
				//$dilivery_notification=['deliveryId'=>$order->deliveryId,'notificationText'=>'del nofify','sentFrom'=>1,'orderId'=>$order->id];
				//create array for order_pruducts table
				$order_products=[];
				//supplier noification
				$supplier_notification=[];
				
				for($i=$no_of_old_products;$i<sizeof($order_data['product_name']);$i++){
					//order_pruducts table
					$order_products[$i]=['order_id'=>$order->id,'product_id'=>$order_data['product_name'][$i],'product_quantity'=>$order_data['product_quantity'][$i]];
					$supplier_notification[$i]=['supplierId'=>$order_data['product_supplier'][$i],'notificationText'=>'notify','sentFrom'=>1,'orderId'=>$order->id];
				}
				
				
				//print_r($saving);
				
				
				
				$order_product_entities = $this->Orders->OrderProducts->newEntities($order_products);
				$order_product_result = $this->Orders->OrderProducts->saveMany($order_product_entities);
				
				
				
				$supplier_notification_entites=$this->Orders->SupplierNotifications->newEntities($supplier_notification);
				$supplier_notification_result=$this->Orders->SupplierNotifications->saveMany($supplier_notification_entites);
				
				//$dlilevery_notification_entity=$this->Orders->DeliveryNotifications->newEntity($dilivery_notification);
				//$dilivery_notification_result=$this->Orders->DeliveryNotifications->save($dlilevery_notification_entity);
				
				}
				
				
				$this->Flash->success ( __ ( 'The order has been saved.' ) );
				
				return $this->redirect ( [ 
						'action' => 'index' 
				] );
			} else {
				$this->Flash->error ( __ ( 'The order could not be saved. Please, try again.' ) );
			}
			
			
		}
		$this->set ( compact ( 'order' ) );
		$this->set ( '_serialize', [ 
				'order' 
		] );
		
		$callcenters = $this->Orders->Callcenter->find ()->select ( [
				'id',
				'firstName',
				'lastName'
		] )->formatResults ( function ($results) {
			/* @var $results \Cake\Datasource\ResultSetInterface|\Cake\Collection\CollectionInterface */
			return $results->combine ( 'id', function ($row) {
				return $row ['firstName'] . ' ' . $row ['lastName'];
			} );
		} );
		$this->set ( compact ( 'callcenters' ) );
		
		$productmodel=$this->loadModel('Products');
		$products=$productmodel->find('list',['fields'=>['id','name']])->distinct(['name']);
		$this->set ( 'products',$products );
		
		$callcenterId = $this->Auth->user ( 'id' ); // get from session values
		$usermodel = $this->loadModel ( 'Callcenter' );
		$callcenterId = $usermodel->getcallcenterid ( $callcenterId );
		$this->set ( compact ( 'callcenterId' ) );
		$deliveries = $this->Orders->Delivery->find ()->select ( [ 
				'id',
				'firstName',
				'lastName' 
		] )->formatResults ( function ($results) {
			/* @var $results \Cake\Datasource\ResultSetInterface|\Cake\Collection\CollectionInterface */
			return $results->combine ( 'id', function ($row) {
				return $row ['firstName'] . ' ' . $row ['lastName'];
			} );
		} );
		$this->set ( compact ( 'deliveries' ) );
		
		$cities = $this->Orders->City->find ()->select ( [ 
				'cid',
				'cname' 
		] )->formatResults ( function ($results) {
			/* @var $results \Cake\Datasource\ResultSetInterface|\Cake\Collection\CollectionInterface */
			return $results->combine ( 'cid', function ($row) {
				return $row ['cname'];
			} );
		} );
		//$this->set ( compact ( 'cities' ) );
		
			$cities = $this->Orders->City->find ()->select ( [
					'cid',
					'cname'
			] )->formatResults ( function ($results) {				
				return $results->combine ( 'cid', function ($row) {
					return $row ['cname'];
				} );
			} );
			$this->set ( compact ( 'cities' ) );
//get current supplier list
/*
 $subQuery=SELECT DISTINCT order_products.product_id,order_products.order_id,product_suppliers.supplier_id FROM `supplier_notifications` JOIN product_suppliers ON supplier_notifications.supplierId=product_suppliers.supplier_id JOIN order_products ON product_suppliers.product_id=order_products.product_id WHERE order_products.order_id=supplier_notifications.orderId
 $products=$productmodel->find('list',['fields'=>['id','name']])->distinct(['name']); 
 * */
			$subQuery=$this->Orders->SupplierNotifications->find('list',['fields'=>['op.product_id','op.order_id','ps.supplier_id']])->distinct(['op.product_id'])
						->join(['table'=>'product_suppliers','alias'=>'ps','type'=>'INNER','conditions'=>'supplierId=ps.supplier_id'])
						->join(['table'=>'order_products','alias'=>'op','type'=>'INNER','conditions'=>'ps.product_id=op.product_id']);
			
			$order_product_details_query=$this->Orders->OrderProducts->find('all',['conditions' =>['order_id'=>$id],'fields'=>['product_id','product_quantity','p.price','package.type','supdata.ps__supplier_id']])
									->join([
											'table'=>'products',
											'alias'=>'p',
											'type'=>'INNER',
											'conditions' => 'product_id = p.id'
											])
									->join([
											'table'=>'package_type',
											'alias'=>'package',
											'type'=>'INNER',
											'conditions' => 'p.package = package.id'
											])
									->join([
											'table'=>$subQuery,
											'alias'=>'supdata',
											'type'=>'INNER',
											/* 'conditions' => 'supdata.product_id = product_id' */
											'conditions' => 'op__product_id = product_id'
									]);
									
			$ordered_products=$order_product_details_query->toArray();	
			
			//print_r($ordered_products);
			foreach ($ordered_products as $product){				
				$product['producttotal']=$product['p']['price']*$product['product_quantity'];
				$product['price']=$product['p']['price'];
				$product['package']=$product['package']['type'];
				$product['supplier']=$product['supdata']['ps__supplier_id'];
				$product['supplier_list']=$this->productsuppliersbyidtoEdit($product['product_id']);
			}								
			$this->set('ordered_products',$ordered_products);	

			
			/*  print '<pre>';
			print_r($ordered_products);
			
			die(); */	 				
	}
	
	/**
	 * Delete method
	 *
	 * @param string|null $id
	 *        	Order id.
	 * @return \Cake\Network\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null) {
		$this->request->allowMethod ( [ 
				'post',
				'delete' 
		] );
		$order = $this->Orders->get ( $id );
		if ($this->Orders->delete ( $order )) {
			$this->Flash->success ( __ ( 'The order has been deleted.' ) );
		} else {
			$this->Flash->error ( __ ( 'The order could not be deleted. Please, try again.' ) );
		}
		
		return $this->redirect ( [ 
				'action' => 'index' 
		] );
	}
	
	public function productsuppliers(){
		
		$this->request->allowMethod ( ['post'] );
		//$productId = $this->request->data( 'productId' );
		$productName = $this->request->data( 'productId' );
		$productmodel=$this->loadModel('Products');
		$product_supplier_city=$productmodel->find('all',['conditions' =>['name'=>$productName]])
		->select(['s.id','s.firstName','s.lastName','city.cname','pack.type'])
		->join ( [
				'table' => 'suppliers',
				'alias' => 's',
				'type' => 'INNER',
				'conditions' => 'products.supplierId = s.id'
		] )
		->join ( [
				'table' => 'city',
				'alias' => 'city',
				'type' => 'INNER',
				'conditions' => 'city.cid = s.city'
		] )
		->join ( [
				'table' => 'package_type',
				'alias' => 'pack',
				'type' => 'INNER',
				'conditions' => 'products.package = pack.id'
		] )/*  ->formatResults ( function ($results) {			
			return $results->combine ( 'id', function ($row) {
				return $row ['s']['firstName'] . ' ' . $row['s'] ['lastName'].' - '.$row['city']['cname'];
			} );
		} ) */;
		
		//return $product_supplier_city;
		$this->set ( 'suppliers',$product_supplier_city );
		$this->set ( '_serialize', [
				'suppliers'
		] );
		
		
		//echo 'kkaakskakaksa';
		//$productmodel=$this->loadModel('Products');
		/*$this->set ('productId',$productId);*/
		//SELECT s.id,s.firstName,s.lastName,city.cname FROM suppliers s join (SELECT * FROM `products` as p WHERE name="leeks") p ON s.id=p.supplierID join city ON city.cid=s.city
		//kasun kalhara, moratuwa
		//http://stackoverflow.com/questions/30413740/how-to-join-multiple-tables-using-cakephp-3

		
	
		
		
	
}
/*
 * get supplier list according to the product id*/
public function productsuppliersbyid(){
	$this->request->allowMethod ( ['post'] );	
	$productId = $this->request->data( 'productId' );
	$productSupModel=$this->loadModel('ProductSuppliers');
	
	$product_supplier_city=$productSupModel->find('all',['conditions' =>['product_id'=>$productId]])
	->select(['s.id','s.firstName','s.lastName','city.cname','pack.type'])
	->join([
			'table'=>'products',
			'alias'=>'products',
			'type'=>'INNER',
			'conditions'=>'products.id=product_id'
	])
	->join ( [
			'table' => 'suppliers',
			'alias' => 's',
			'type' => 'INNER',
			'conditions' => 'supplier_Id = s.id'
	] )
	->join ( [
			'table' => 'city',
			'alias' => 'city',
			'type' => 'INNER',
			'conditions' => 'city.cid = s.city'
	] )
	->join ( [
			'table' => 'package_type',
			'alias' => 'pack',
			'type' => 'INNER',
			'conditions' => 'products.package = pack.id'
	] )/*  ->formatResults ( function ($results) {
			return $results->combine ( 'id', function ($row) {
					return $row ['s']['firstName'] . ' ' . $row['s'] ['lastName'].' - '.$row['city']['cname'];
					} );
			} ) */;
	
	//return $product_supplier_city;
	$this->set ( 'suppliers',$product_supplier_city );
	$this->set ( '_serialize', [
			'suppliers'
	] );
	
}


/*get product supplier list for edit view*/
public function productsuppliersbyidtoEdit($productid){
	//$this->request->allowMethod ( ['post'] );
	$productId = $productid;
	$productSupModel=$this->loadModel('ProductSuppliers');

	$product_supplier_city=$productSupModel->find('all',['conditions' =>['product_id'=>$productId]])
	->select(['s.id','s.firstName','s.lastName','city.cname'])
	->join([
			'table'=>'products',
			'alias'=>'products',
			'type'=>'INNER',
			'conditions'=>'products.id=product_id'
	])
	->join ( [
			'table' => 'suppliers',
			'alias' => 's',
			'type' => 'INNER',
			'conditions' => 'supplier_Id = s.id'
	] )
	->join ( [
			'table' => 'city',
			'alias' => 'city',
			'type' => 'INNER',
			'conditions' => 'city.cid = s.city'
	] )
	  ->formatResults ( function ($results) {
			return $results->combine ( 's.id', function ($row) {
					return $row ['s']['firstName'] . ' ' . $row['s'] ['lastName'].' - '.$row['city']['cname'];
					} );
			} );
	  	return $product_supplier_city;

/* 	//return $product_supplier_city;
	$this->set ( 'suppliers',$product_supplier_city );
	$this->set ( '_serialize', [
			'suppliers'
	]  );*/

}

//jquery calculae single product total ammount
public function singlecal(){
	//$this->request->allowMethod ( ['post'] );
	$productId = $this->request->data( 'productId' );
	$productQuantity = $this->request->data( 'quantity' );
// 	$productQuantity=5;
// 	$productId=31;
	$productSupModel=$this->loadModel('Products');
	$price_obj=$productSupModel->get($productId,['fields'=>['price']]);
	$price=$price_obj->price;
	$total=$price*$productQuantity;
	
	echo '{"productQuantity":'.$productQuantity.',"productPrice":'.$price.',"total":'.$total.'}';
	//echo '{"total":'.$total.'}';
	//$singleCalPrice=['total'];
	//echo json_encode($singleCalPrice);
}
//for php count
public function countSubTotal($arrIds,$arrQuantity){
	$productSupModel=$this->loadModel('Products');
	$subTotal=0;
	for ($i=0;$i<sizeof($arrIds);$i++){
	$price_obj=$productSupModel->get($arrIds[$i],['fields'=>['price']]);
	$price=$price_obj->price;
	$total=$price*$arrQuantity[$i];
	$subTotal+=$total;
	}
	return $subTotal;
}
/* public function countFinaltotal($subtotal,$tax_p=0,$discount_p=0,$coupon_value=0){
	$tax=$subtotal*$tax_p/100;
	$discount=$subtotal*$discount_p/100;
	$total=$subtotal+$tax-$discount-$coupon_value;
	return $total;
} */

public function processdata($data){
	$tax_p=10;//tax persontage
	$discount_p=5;//discount persentage
	$counpon_value=0;//call to a function to find coupon values
	$subtotal=$this->countSubTotal($data['product_name'],$data['product_quantity']);//count sub total
	$tax=$subtotal*$tax_p/100;
	$discount=$subtotal*$discount_p/100;
	$total=$subtotal+$tax-$discount-$counpon_value;
	
	$newdata=[
			'customerId'=>$data['customerId'],
			'address'=>$data['address'],
			'city'=>$data['city'],
			'latitude'=>$data['latitude'],
			'longitude'=>$data['longitude'],
			'callcenterId'=>$data['callcenterId'],
			'deliveryId'=>$data['deliveryId'],
			
			'subTotal'=>$subtotal,
			'tax'=>$tax,
			'discount'=>$discount,	
					
			'couponCode'=>$data['couponCode'],
			
			'total'=>$total,
			'paymentStatus'=>$data['paymentStatus'],
			'status'=>$data['status']
	];
	return $newdata;
}



}
//http://www.jqueryscript.net/form/jQuery-Plugin-To-Duplicate-and-Remove-Form-Fieldsets-Multifield.html
//http://stackoverflow.com/questions/17175534/clonned-select2-is-not-responding
//http://stackoverflow.com/questions/28518158/jquery-select2-dropdown-disabled-when-cloning-a-table-row
//http://stackoverflow.com/questions/32415132/how-to-clone-select2-v4-ajax


//http://stackoverflow.com/questions/11054402/jquery-onchange-event-for-cloned-field



///https://www.packtpub.com/books/content/working-simple-associations-using-cakephp

//http://stackoverflow.com/questions/34651392/cakephp-3-x-multiple-records-from-one-form-into-multiple-tables
//http://stackoverflow.com/questions/16443656/cannot-save-associated-data-with-hasmany-through-join-model
//http://stackoverflow.com/questions/4260445/save-multiple-records-for-one-model-in-cakephp

//http://stackoverflow.com/questions/30711705/get-last-inserted-id-after-inserting-to-associated-table