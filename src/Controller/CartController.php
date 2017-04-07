<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Cart;
use App\Model\Entity\CartProduct;
use App\Model\Table\CartProductsTable;
use App\Model\Table\CartTable;
use App\Model\Entity\User;
use Cake\I18n\Time;

/**
 * Cart Controller
 *
 * @property \App\Model\Table\CartTable $Cart
 */
class CartController extends AppController {
/* 	public function beforeFilter(\Cake\Event\Event $event) {
		// allow all action
		$this->Auth->allow ( [ 
				'addproduct',
				'deleteproduct',
				'clearcart',
				'editqty',
				'getcart' 
		] );
	}
	 */
	
	public function isAuthorized($user) {
	
		// The owner of an article can edit and delete it
		if (in_array ( $this->request->action, [
				'addproduct',
				'deleteproduct',
				'clearcart',
				'editqty',
				'getcart'
		] )) {
				
			if (isset ( $user ['user_type'] ) && $user ['user_type'] == 5) {
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
	public function __getCartId($user_id) {
		//$session_id = $this->__getSessionId ();
		//$user_id = $this->__getUserId ();
		$cart_id = $this->Cart->find ( 'all', [ 
				'fields' => [ 
						'id' 
				] 
		] )->where ( [ 
				'user_id' => $user_id 
		] )->toArray ();
		
		if (sizeof ( $cart_id ) > 0) {
			$cart_id = $cart_id [0]->id;
		} else {
			return false;
			/* $cart_data = [ 
					'user_id' => $user_id,
					'session_id' => $session_id 
			];
			$cart_entity = $this->Cart->newEntity ( $cart_data );
			$saving = $this->Cart->save ( $cart_entity );
			$cart_id = $cart_entity->id; */
		}
		
		return $cart_id;
	}
	public function __getCurrentCartId($user_id) {
		//$session_id = $this->__getSessionId ();
		//$user_id = $this->__getUserId ();
		$cart_id = $this->Cart->find ( 'all', [ 
				'fields' => [ 
						'id' 
				] 
		] )->where ( [ 
				'user_id' => $user_id 
		] )->toArray ();
		
		if (sizeof ( $cart_id ) > 0) {
			$cart_id = $cart_id [0]->id;
		} else {
			$cart_id = null;
		}
		return $cart_id;
	}
	public function __isInCart($cart_id, $product_id, $type) {
		$cart_product_model = $this->loadModel ( 'CartProducts' );
		$result = $cart_product_model->find ( 'all', [ 
				'conditions' => [ 
						'cart_id' => $cart_id,
						'product_id' => $product_id,
						'type' => $type 
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
			$token = $this->request->data ( 'token' );
			
			$chck = $this->__checkToken ( $token );
			if ($chck ['boolean']) {
				if ($product_id != null && $product_qty != null) {
					$cart_id = $this->__getCartId ($chck ['user_id']);
					if ($cart_id && ! $this->__isInCart ( $cart_id, $product_id, 1 )) {
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
					} else {
						$return ['status'] = 0;
						$return ['message'] = 'The pruduct already in your catr';
					}
				} else {
					$return ['status'] = 401;
					$return ['message'] = "please select product to add cart";
				}
			} else {
				$return ['status'] = 500;
				$return ['message'] = $chck ['message'];
			}
		} else {
			$return ['status'] = 500;
			$return ['message'] = "Unauthorized acess";
		}
		echo json_encode ( $return );
		die ();
	}
	public function deleteproduct() {
		$this->request->allowMethod ( [ 
				'post',
				'delete' 
		] );
		
		header ( 'Content-type: application/json' );
		if ($this->request->is ( 'post' )) {
			$product_id = $this->request->data ( 'product_id' );
			$token = $this->request->data ( 'token' );
			$chck = $this->__checkToken ( $token );
			if ($chck ['boolean']) {
				if ($product_id != null) {
					$cart_id = $this->__getCurrentCartId ($chck ['user_id']);
					if ($cart_id) {
						$cart_product_model = $this->loadModel ( 'CartProducts' );
						
						$product = $cart_product_model->find ( 'all', [ 
								'fields' => [ 
										'id' 
								],
								'conditions' => [ 
										'cart_id' => $cart_id,
										'product_id' => $product_id,
										'type' => 1 
								] 
						] )->toArray ();
						if (sizeof ( $product ) > 0) {
							if ($cart_product_model->delete ( $cart_product_model->get ( $product [sizeof ( $product ) - 1]->id ) )) {
								$return ['status'] = 0;
								$return ['message'] = 'Pruduct deleted successfully';
								$return ['result'] = $this->__getcartIn ($chck ['user_id']);
							} else {
								$return ['status'] = 500;
								$return ['message'] = 'Culd not delete the product';
							}
						} else {
							$return ['status'] = 500;
							$return ['message'] = 'The product not found in the cart';
						}
					} else {
						$return ['status'] = 500;
						$return ['message'] = 'you havent create a cart';
					}
				} else {
					$return ['status'] = 500;
					$return ['message'] = 'please select product id';
				}
			} else {
				$return ['status'] = 500;
				$return ['message'] = $chck ['message'];
			}
		} else {
			$return ['status'] = 500;
			$return ['message'] = "Unauthorized acess";
		}
		echo json_encode ( $return );
		die ();
	}
	public function clearcart() {
		$this->request->allowMethod ( [ 
				'post' 
		] );
		header ( 'Content-type: application/json' );
		$token = $this->request->data ( 'token' );
		$chck = $this->__checkToken ( $token );
		if ($chck ['boolean']) {
			
			$cart_id = $this->__getCurrentCartId ($chck ['user_id']);
			if ($cart_id) {
				$cart_product_model = $this->loadModel ( 'CartProducts' );
				if ($cart_product_model->deleteAll ( [ 
						'cart_id' => $cart_id,
						'type' => 1 
				] )) {
					$return ['status'] = 0;
					$return ['message'] = 'cart clear success';
				} else {
					$return ['status'] = 500;
					$return ['message'] = 'cartclear not clear or car is empty';
				}
			} else {
				$return ['status'] = 500;
				$return ['message'] = 'you havent create a cart';
			}
		} else {
			$return ['status'] = 500;
			$return ['message'] = $chck ['message'];
		}
		
		echo json_encode ( $return );
		die ();
	}
	public function editqty() {
		header ( 'Content-type: application/json' );
		if ($this->request->is ( 'post' )) {
			$product_id = $this->request->data ( 'product_id' );
			$qty = $this->request->data ( 'qty' );
			$token = $this->request->data ( 'token' );
			$chck = $this->__checkToken ( $token );
			if ($chck ['boolean']) {
				
				if ($product_id != null && $qty != null) {
					$cart_id = $this->__getCurrentCartId ($chck ['user_id']);
					if ($cart_id) {
						$cart_product_model = $this->loadModel ( 'CartProducts' );
						$product = $cart_product_model->find ( 'all', [ 
								'fields' => [ 
										'id' 
								],
								'conditions' => [ 
										'cart_id' => $cart_id,
										'product_id' => $product_id,
										'type' => 1 
								] 
						] )->toArray ();
						if (sizeof ( $product ) > 0) {
							$product = $cart_product_model->get ( $product [sizeof ( $product ) - 1]->id );
							$product->qty = $qty;
							if ($cart_product_model->save ( $product )) {
								$return ['status'] = 0;
								$return ['message'] = 'Pruduct qty updated successfully';
								$return ['result'] = $this->__getcartIn ($chck ['user_id']);
							} else {
								$return ['status'] = 500;
								$return ['message'] = 'Culd not update the qty';
							}
						} else {
							$return ['status'] = 500;
							$return ['message'] = 'The product not found in the cart';
						}
					} else {
						$return ['status'] = 500;
						$return ['message'] = 'you havent create a cart';
					}
				} else {
					$return ['status'] = 500;
					$return ['message'] = 'please select product id and qty';
				}
			} else {
				$return ['status'] = 500;
				$return ['message'] = $chck ['message'];
			}
		} else {
			$return ['status'] = 500;
			$return ['message'] = "Unauthorized acess";
		}
		echo json_encode ( $return );
		die ();
	}
	public function getcart() {
		$this->request->allowMethod ( [ 
				'post' 
		] );
		header ( 'Content-type: application/json' );
		
		$token = $this->request->data ( 'token' );
		$chck = $this->__checkToken ( $token );
		if ($chck ['boolean']) {
			
			$cart_id = $this->__getCurrentCartId ($chck ['user_id']);
			
			if ($cart_id) {
				
				$total = $this->__getTotal ( $cart_id );
				$cart_products = CartProductsTable::getCart ( $cart_id, 1 );
				
				if (sizeof ( $cart_products ) > 0) {
					$return ['status'] = 0;
					$return ['message'] = 'success';
					$return ['result'] ['product_list'] = $cart_products;
					$return ['result'] ['total'] = $total;
				} else {
					$return ['status'] = 0;
					$return ['message'] = 'your cart is empty';
					$return ['result'] = [ ];
				}
			} else {
				$return ['status'] = 500;
				$return ['message'] = "you haven't create a cart";
			}
		} else {
			$return ['status'] = 500;
			$return ['message'] = $chck ['message'];
		}
		
		echo json_encode ( $return );
		die ();
	}
	public function __getcartIn($user_id) {
		$this->request->allowMethod ( [ 
				'post',
				'get' 
		] );
		header ( 'Content-type: application/json' );
		$cart_id = $this->__getCurrentCartId ($user_id);
		
		if ($cart_id) {
			
			$total = $this->__getTotal ( $cart_id );
			$cart_products = CartProductsTable::getCart ( $cart_id, 1 );
			
			if (sizeof ( $cart_products ) > 0) {
				$return ['status'] = 0;
				$return ['message'] = 'success';
				$return ['result'] ['product_list'] = $cart_products;
				$return ['result'] ['total'] = $total;
			} else {
				$return ['status'] = 0;
				$return ['message'] = 'your cart is empty';
				$return ['result'] = [ ];
			}
		} else {
			$return ['status'] = 500;
			$return ['message'] = "you haven't create a cart";
		}
		return $return;
		die ();
	}
	public function __getTotal($cart_id) {
		$tax_p = 0; // tax persontage 10
		$discount_p = 0; // discount persentage 5
		$counpon_value = 0; // call to a function to find coupon values
		$sub_total = CartTable::getTotal ( $cart_id, 1 );
		
		$tax = $sub_total * $tax_p / 100;
		$discount = $sub_total * $discount_p / 100;
		$grand_total = $sub_total + $tax - $discount - $counpon_value;
		
		$total ['sub_total'] = $sub_total;
		$total ['tax'] = $tax;
		$total ['discount'] = $discount;
		$total ['grand_total'] = $grand_total;
		return $total;
	}
	private function __updateMobTokenTime($token) {
		$user_model = $this->loadModel ( 'users' );
		$user = $user_model->find ( 'all', [ 
				'conditions' => [ 
						'mobtoken' => $token 
				] 
		] );
		$user->mobtoken_created_at = date ( 'Y-m-d H:i:s' );
		return $user_model->save ( $user );
	}
	/**
	 *
	 * @param unknown $token        	
	 * @return multitype:boolean string
	 */
	function __checkToken($token) {
		$user_model = $this->loadModel ( 'users' );
		$user = $user_model->find ( 'all', [ 
				'conditions' => [ 
						'mobtoken' => $token 
				] 
		] )->first ();
		if (sizeof ( $user ) <= 0) {
			return [ 
					'boolean' => false,
					'message' => 'token not found' 
			];
		} else {
			$mobtoken_created_at = $user->mobtoken_created_at;
			$mobtoken_created_at = new Time ( $mobtoken_created_at );
			/* echo $mobtoken_created_at;
			die (); */
			if ($mobtoken_created_at->wasWithinLast (1)) {
				$user->mobtoken_created_at = date ( 'Y-m-d H:i:s' );
				$user_model->save ( $user );
				
				return [ 
						'boolean' => true,
						'message' => 'token matched',
						'user_id' => $user->id 
				];
			} else {
				return [ 
						'boolean' => false,
						'message' => 'token expired' 
				];
			}
		}
	}
}
