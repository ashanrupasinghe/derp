<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProductSuppliers Controller
 *
 * @property \App\Model\Table\ProductSuppliersTable $ProductSuppliers
 */
class ProductSuppliersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products', 'Suppliers']
        ];
        $productSuppliers = $this->paginate($this->ProductSuppliers);

        $this->set(compact('productSuppliers'));
        $this->set('_serialize', ['productSuppliers']);
    }

    /**
     * View method
     *
     * @param string|null $id Product Supplier id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productSupplier = $this->ProductSuppliers->get($id, [
            'contain' => ['Products', 'Suppliers']
        ]);

        $this->set('productSupplier', $productSupplier);
        $this->set('_serialize', ['productSupplier']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productSupplier = $this->ProductSuppliers->newEntity();
        if ($this->request->is('post')) {
            $productSupplier = $this->ProductSuppliers->patchEntity($productSupplier, $this->request->data);
            if ($this->ProductSuppliers->save($productSupplier)) {
                $this->Flash->success(__('The product supplier has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The product supplier could not be saved. Please, try again.'));
            }
        }
        $products = $this->ProductSuppliers->Products->find('list', ['limit' => 200]);
        $suppliers = $this->ProductSuppliers->Suppliers->find('list', ['limit' => 200]);
        $this->set(compact('productSupplier', 'products', 'suppliers'));
        $this->set('_serialize', ['productSupplier']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Supplier id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productSupplier = $this->ProductSuppliers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productSupplier = $this->ProductSuppliers->patchEntity($productSupplier, $this->request->data);
            if ($this->ProductSuppliers->save($productSupplier)) {
                $this->Flash->success(__('The product supplier has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The product supplier could not be saved. Please, try again.'));
            }
        }
        $products = $this->ProductSuppliers->Products->find('list', ['limit' => 200]);
        $suppliers = $this->ProductSuppliers->Suppliers->find('list', ['limit' => 200]);
        $this->set(compact('productSupplier', 'products', 'suppliers'));
        $this->set('_serialize', ['productSupplier']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Supplier id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productSupplier = $this->ProductSuppliers->get($id);
        if ($this->ProductSuppliers->delete($productSupplier)) {
            $this->Flash->success(__('The product supplier has been deleted.'));
        } else {
            $this->Flash->error(__('The product supplier could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
