<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Cart Controller
 *
 * @property \App\Model\Table\CartTable $Cart
 */
class CartController extends AppController {
	public function beforeFilter(\Cake\Event\Event $event) {
		// allow all action
		$this->Auth->allow ( [ 
				'addproduct' 
		] );
	}
	
	/**
	 * Index method
	 *
	 * @return \Cake\Network\Response|null
	 */
	public function index() {
		$this->paginate = [ 
				'contain' => [ 
						'Users',
						'Sessions' 
				] 
		];
		$cart = $this->paginate ( $this->Cart );
		
		$this->set ( compact ( 'cart' ) );
		$this->set ( '_serialize', [ 
				'cart' 
		] );
	}
	
	/**
	 * View method
	 *
	 * @param string|null $id
	 *        	Cart id.
	 * @return \Cake\Network\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null) {
		$cart = $this->Cart->get ( $id, [ 
				'contain' => [ 
						'Users',
						'Sessions',
						'Products' 
				] 
		] );
		
		$this->set ( 'cart', $cart );
		$this->set ( '_serialize', [ 
				'cart' 
		] );
	}
	
	/**
	 * Add method
	 *
	 * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add() {
		$cart = $this->Cart->newEntity ();
		if ($this->request->is ( 'post' )) {
			$cart = $this->Cart->patchEntity ( $cart, $this->request->getData () );
			if ($this->Cart->save ( $cart )) {
				$this->Flash->success ( __ ( 'The cart has been saved.' ) );
				
				return $this->redirect ( [ 
						'action' => 'index' 
				] );
			}
			$this->Flash->error ( __ ( 'The cart could not be saved. Please, try again.' ) );
		}
		$users = $this->Cart->Users->find ( 'list', [ 
				'limit' => 200 
		] );
		$sessions = $this->Cart->Sessions->find ( 'list', [ 
				'limit' => 200 
		] );
		$products = $this->Cart->Products->find ( 'list', [ 
				'limit' => 200 
		] );
		$this->set ( compact ( 'cart', 'users', 'sessions', 'products' ) );
		$this->set ( '_serialize', [ 
				'cart' 
		] );
	}
	
	/**
	 * Edit method
	 *
	 * @param string|null $id
	 *        	Cart id.
	 * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null) {
		$cart = $this->Cart->get ( $id, [ 
				'contain' => [ 
						'Products' 
				] 
		] );
		if ($this->request->is ( [ 
				'patch',
				'post',
				'put' 
		] )) {
			$cart = $this->Cart->patchEntity ( $cart, $this->request->getData () );
			if ($this->Cart->save ( $cart )) {
				$this->Flash->success ( __ ( 'The cart has been saved.' ) );
				
				return $this->redirect ( [ 
						'action' => 'index' 
				] );
			}
			$this->Flash->error ( __ ( 'The cart could not be saved. Please, try again.' ) );
		}
		$users = $this->Cart->Users->find ( 'list', [ 
				'limit' => 200 
		] );
		$sessions = $this->Cart->Sessions->find ( 'list', [ 
				'limit' => 200 
		] );
		$products = $this->Cart->Products->find ( 'list', [ 
				'limit' => 200 
		] );
		$this->set ( compact ( 'cart', 'users', 'sessions', 'products' ) );
		$this->set ( '_serialize', [ 
				'cart' 
		] );
	}
	
	/**
	 * Delete method
	 *
	 * @param string|null $id
	 *        	Cart id.
	 * @return \Cake\Network\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null) {
		$this->request->allowMethod ( [ 
				'post',
				'delete' 
		] );
		$cart = $this->Cart->get ( $id );
		if ($this->Cart->delete ( $cart )) {
			$this->Flash->success ( __ ( 'The cart has been deleted.' ) );
		} else {
			$this->Flash->error ( __ ( 'The cart could not be deleted. Please, try again.' ) );
		}
		
		return $this->redirect ( [ 
				'action' => 'index' 
		] );
	}
	public function __getSessionId() {
		if (! $this->request->session ()->id ()) {
			session_start ();
		}
		$session_id = $this->request->session ()->id ();
		return $session_id;
	}
	public function __getUserId() {
		if ($this->Auth->user ( 'id' )) {
			return $this->Auth->user ( 'id' );
		}
		return null;
	}
	public function __getCartId() {
		$session_id = $this->__getSessionId ();
		$user_id = $this->__getUserId ();
		$cart_id = $this->Cart->find ( 'all', [ 
				'fields' => [ 
						'id' 
				] 
		] )->orWhere ( [ 
				'user_id' => $user_id 
		] )->orWhere ( [ 
				'session_id' => $session_id 
		] )->toArray ();
		
		if (sizeof ( $cart_id ) == 1) {
			$cart_id = $cart_id [0]->id;
		} else {
			$cart_data = [ 
					'user_id' => $user_id,
					'session_id' => $session_id 
			];
			$cart_entity = $this->Cart->newEntity ( $cart_data );
			$saving = $this->Cart->save ( $cart_entity );
			$cart_id = $cart_entity->id;
		}
		
		return $cart_id;
	}
	public function __isInCart($cart_id, $product_id,$type) {
		$cart_product_model = $this->loadModel ( 'CartProducts' );
		$result = $cart_product_model->find ( 'all', [ 
				'conditions' => [ 
						'cart_id' => $cart_id,
						'product_id' => $product_id,
						'type'=>$type 
				] 
		] )->toArray ();
		if (sizeof ( $result ) > 0) {
			return true;
		}
		return false;
	}
	public function addproduct() {
		header ( 'Content-type: application/json' );
		if ($this->request->is ( 'post' )) {
			// $data=$this->request->data();//cart_id,product_id,qty,type[default-1]
			$product_id = $this->request->data ( 'product_id' );
			$product_qty = $this->request->data ( 'qty' );
			if ($product_id != null && $product_qty != null) {
				$cart_id = $this->__getCartId ();
			if(!$this->__isInCart($cart_id,$product_id,1))
				{
					$data = [ 
							'cart_id' => $cart_id,
							'product_id' => $product_id,
							'qty' => $product_qty,
							'type' => 1 
					];
					
					$cart_product_model = $this->loadModel ( 'CartProducts' );
					$product_entity = $cart_product_model->newEntity ( $data );
					$saving = $cart_product_model->save ( $product_entity );
					if ($saving) {
						$return ['status'] = 0;
						$return ['message'] = 'Pruduct is added to catr';
					} else {
						$return ['status'] = 500;
						$return ['message'] = 'Pruduct is not added to catr';
					}
				}else
				{
					$return ['status'] = 0;
					$return ['message'] = 'The pruduct already in your catr';
				}
			} else {
				$return ['status'] = 401;
				$return ['message'] = "please select product to add cart";
			}
		} else {
			$return ['status'] = 500;
			$return ['message'] = "Unauthorized acess";
		}
		echo json_encode ( $return );
		die ();
	}
}