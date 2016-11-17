<?php

namespace App\Controller;

use App\Controller\AppController;

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
				'productsuppliers' 
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
		//$sup=$this->productsuppliers('leeks');
		$session = $this->request->session ();
		$client_id = $session->read ( 'Config.clientid' );
		//$session->
		$order = $this->Orders->newEntity ();
		if ($this->request->is ( 'post' )) {
			print '<pre>';
			print_r($this->request->data);
			die();
			
			$order = $this->Orders->patchEntity ( $order, $this->request->data );
			if ($this->Orders->save ( $order )) {
				$session->destroy('Config.clientid');
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
		$products=$productmodel->find('list',['fields'=>['id','name']]);
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
		$this->set ( compact ( 'sup' ) );
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
			$order = $this->Orders->patchEntity ( $order, $this->request->data );
			if ($this->Orders->save ( $order )) {
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
		$callcenterId = $this->Auth->user ( 'id' ); // get from session values
		$usermodel = $this->loadModel ( 'Callcenter' );
		$callcenterId = $usermodel->getcallcenterid ( $callcenterId );
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
		->select(['s.id','s.firstName','s.lastName','city.cname'])
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
}
//http://www.jqueryscript.net/form/jQuery-Plugin-To-Duplicate-and-Remove-Form-Fieldsets-Multifield.html
//http://stackoverflow.com/questions/17175534/clonned-select2-is-not-responding
//http://stackoverflow.com/questions/28518158/jquery-select2-dropdown-disabled-when-cloning-a-table-row
//http://stackoverflow.com/questions/32415132/how-to-clone-select2-v4-ajax


//http://stackoverflow.com/questions/11054402/jquery-onchange-event-for-cloned-field