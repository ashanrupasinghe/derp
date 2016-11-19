<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
class ProductsController extends AppController
{

	public function isAuthorized($user)
	{
		if (in_array($this->request->action, ['view','index'])) {				
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
    public function index()
    {
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
        $this->set('_serialize', ['products']);
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, ['contain' => ['OrderProducts']]);

        $this->set(compact('product'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('product'));
        $this->set('_serialize', ['product']);
		
		
		$suppliers = $this->Products->Suppliers->find()
											->select(['id', 'firstName', 'lastName'])
											->formatResults(function($results) {
											/* @var $results \Cake\Datasource\ResultSetInterface|\Cake\Collection\CollectionInterface */
											return $results->combine('id',function($row) {
																							return $row['firstName'] . ' ' . $row['lastName'];
																						}
																	);
    });
	$this->set(compact('suppliers'));
	
	$packages = $this->Products->PackageType->find()
	->select(['id','type'])
	->formatResults(function($results) {
		/* @var $results \Cake\Datasource\ResultSetInterface|\Cake\Collection\CollectionInterface */
		return $results->combine('id',function($row) {
			return $row['type'];
		}
			);
	});

	$this->set(compact('packages'));
	
	
	
	
    
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('product'));
        $this->set('_serialize', ['product']);
        $suppliers = $this->Products->Suppliers->find()
        ->select(['id', 'firstName', 'lastName'])
        ->formatResults(function($results) {
        	/* @var $results \Cake\Datasource\ResultSetInterface|\Cake\Collection\CollectionInterface */
        	return $results->combine('id',function($row) {
        		return $row['firstName'] . ' ' . $row['lastName'];
        	}
        		);
        });
        $this->set(compact('suppliers'));
        $packages = $this->Products->PackageType->find()
        ->select(['id','type'])
        ->formatResults(function($results) {
        	/* @var $results \Cake\Datasource\ResultSetInterface|\Cake\Collection\CollectionInterface */
        	return $results->combine('id',function($row) {
        		return $row['type'];
        	}
        		);
        });
        
        	$this->set(compact('packages'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
