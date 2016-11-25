<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 */
class CustomersController extends AppController {
	
	public function isAuthorized($user)
	{
		
	
		// The owner of an article can edit and delete it
		if (in_array($this->request->action, ['add','edit', 'delete','view','index','search','result','check'])) {
			
			if (isset($user['user_type']) && $user['user_type'] == 2) {
				return true;
			}
		}
	
		return parent::isAuthorized($user);
	}
	
	/**
	 * Index method
	 *
	 * @return \Cake\Network\Response|null
	 */
	public function index() {
		$customers = $this->paginate ( $this->Customers );
		
		$this->set ( compact ( 'customers' ) );
		$cities_query=$this->Customers->City->find('list',['keyField'=>'cid','valueField'=>'cname']);
		$city=$cities_query->toArray();
		$this->set('cities',$city);
		$this->set ( '_serialize', [ 
				'customers' 
		] );
	}
	
	/**
	 * View method
	 *
	 * @param string|null $id
	 *        	Customer id.
	 * @return \Cake\Network\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null) {
		$customer = $this->Customers->get ( $id, [ 
				'contain' => ['city'] 
		] );
	/* 	print '<pre>';
		print_r($customer);
		die(); */
		$this->set ( 'customer', $customer );
		$this->set ( '_serialize', [ 
				'customer' 
		] );
	}
	
	/**
	 * Add method
	 *
	 * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
	 */
	public function add() {
		$customer = $this->Customers->newEntity ();
		if ($this->request->is ( 'post' )) {
			$customer = $this->Customers->patchEntity ( $customer, $this->request->data );
			if ($this->Customers->save ( $customer )) {
				$this->Flash->success ( __ ( 'The customer has been saved.' ) );
				
				return $this->redirect ( [ 
						'action' => 'index' 
				] );
			} else {
				$this->Flash->error ( __ ( 'The customer could not be saved. Please, try again.' ) );
			}
		}
		$this->set ( compact ( 'customer' ) );
		$this->set ( '_serialize', [ 
				'customer' 
		] );
		
		$cities = $this->Customers->City->find ()->select ( [
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
	 *        	Customer id.
	 * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null) {
		$customer = $this->Customers->get ( $id, [ 
				'contain' => [ ] 
		] );
		if ($this->request->is ( [ 
				'patch',
				'post',
				'put' 
		] )) {
			$customer = $this->Customers->patchEntity ( $customer, $this->request->data );
			if ($this->Customers->save ( $customer )) {
				$this->Flash->success ( __ ( 'The customer has been saved.' ) );
				
				return $this->redirect ( [ 
						'action' => 'index' 
				] );
			} else {
				$this->Flash->error ( __ ( 'The customer could not be saved. Please, try again.' ) );
			}
		}
		$this->set ( compact ( 'customer' ) );
		$this->set ( '_serialize', [ 
				'customer' 
		] );
		
		$cities = $this->Customers->City->find ()->select ( [
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
	public function search() {
		
		/*
		 * $customer = $this->Customers->get($phone_name);
		 * print_r($customer);
		 * die();
		 */
		// https://github.com/friendsofcake/search#table-class
		
		// $this->set(compact('customer'));
		// $this->set('_serialize', ['customer']);
	}
	public function result() {
		$customers = $this->paginate ( $this->Customers );
		$s = $this->request->data ( 's' );
		if (! empty ( $s )) {
			$customers = $this->Customers->find ( 'all', [ 
					'conditions' => [ 
							'OR' => [ 
									'Customers.firstName LIKE' => '%' . $s . '%',
									'Customers.lastName LIKE' => '%' . $s . '%',
									'Customers.mobileNo =' => $s 
							] 
					] 
			] );
			/* print '<pre>';
			print_r($customers);
			print '</pre>'; */
			if($customers->isEmpty()){
				$this->Flash->error ( __ ( 'No Result Found, Please Add New Client' ) );
			}
			$this->set ( 'customers', $customers );
			$this->set ( 's', $s );
			$this->set ( '_serialize', [ 
					'customers' 
			] );
		} else {
			$this->Flash->error ( __ ( 'Add a Name or Phone. Please' ) );
			return $this->redirect ( [ 
					'action' => 'search' 
			] );
		}
	}
	/**
	 * Delete method
	 *
	 * @param string|null $id
	 *        	Customer id.
	 * @return \Cake\Network\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null) {
		$this->request->allowMethod ( [ 
				'post',
				'delete' 
		] );
		$customer = $this->Customers->get ( $id );
		if ($this->Customers->delete ( $customer )) {
			$this->Flash->success ( __ ( 'The customer has been deleted.' ) );
		} else {
			$this->Flash->error ( __ ( 'The customer could not be deleted. Please, try again.' ) );
		}
		
		return $this->redirect ( [ 
				'action' => 'index' 
		] );
	}
	//set customer id to session
	public function check($id){
		$this->request->allowMethod ( [
				'post'
		] );		
		$clientid = $this->Customers->get ( $id );
		$session = $this->request->session();
		//$session->read('Config.language');
		$session->write('Config.clientid', $id);
		return $this->redirect(['controller'=>'orders','action' => 'add']);
	
	
	}
}
