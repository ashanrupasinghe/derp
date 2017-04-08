<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Shipping Controller
 *
 * @property \App\Model\Table\ShippingTable $Shipping
 */
class ShippingController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Carts', 'Orders']
        ];
        $shipping = $this->paginate($this->Shipping);

        $this->set(compact('shipping'));
        $this->set('_serialize', ['shipping']);
    }

    /**
     * View method
     *
     * @param string|null $id Shipping id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shipping = $this->Shipping->get($id, [
            'contain' => ['Carts', 'Orders']
        ]);

        $this->set('shipping', $shipping);
        $this->set('_serialize', ['shipping']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shipping = $this->Shipping->newEntity();
        if ($this->request->is('post')) {
            $shipping = $this->Shipping->patchEntity($shipping, $this->request->getData());
            if ($this->Shipping->save($shipping)) {
                $this->Flash->success(__('The shipping has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shipping could not be saved. Please, try again.'));
        }
        $carts = $this->Shipping->Carts->find('list', ['limit' => 200]);
        $orders = $this->Shipping->Orders->find('list', ['limit' => 200]);
        $this->set(compact('shipping', 'carts', 'orders'));
        $this->set('_serialize', ['shipping']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Shipping id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shipping = $this->Shipping->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shipping = $this->Shipping->patchEntity($shipping, $this->request->getData());
            if ($this->Shipping->save($shipping)) {
                $this->Flash->success(__('The shipping has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shipping could not be saved. Please, try again.'));
        }
        $carts = $this->Shipping->Carts->find('list', ['limit' => 200]);
        $orders = $this->Shipping->Orders->find('list', ['limit' => 200]);
        $this->set(compact('shipping', 'carts', 'orders'));
        $this->set('_serialize', ['shipping']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Shipping id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shipping = $this->Shipping->get($id);
        if ($this->Shipping->delete($shipping)) {
            $this->Flash->success(__('The shipping has been deleted.'));
        } else {
            $this->Flash->error(__('The shipping could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
