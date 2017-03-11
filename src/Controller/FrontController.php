<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 */
class FrontController extends AppController {
	public function isAuthorized($user)
	{	

		if (in_array($this->request->action, ['index'])) {
				
			if (isset($user['user_type']) && $user['user_type'] == 5) {
				return true;
			}
		}
	
		return parent::isAuthorized($user);
	}
	
	public function index() {	
		
		
	
	}
}
