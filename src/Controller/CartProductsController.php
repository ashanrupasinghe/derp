<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CartProducts Controller
 *
 * @property \App\Model\Table\CartProductsTable $CartProducts
 */
class CartProductsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Carts', 'Products']
        ];
        $cartProducts = $this->paginate($this->CartProducts);

        $this->set(compact('cartProducts'));
        $this->set('_serialize', ['cartProducts']);
    }

    /**
     * View method
     *
     * @param string|null $id Cart Product id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cartProduct = $this->CartProducts->get($id, [
            'contain' => ['Carts', 'Products']
        ]);

        $this->set('cartProduct', $cartProduct);
        $this->set('_serialize', ['cartProduct']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cartProduct = $this->CartProducts->newEntity();
        if ($this->request->is('post')) {
            $cartProduct = $this->CartProducts->patchEntity($cartProduct, $this->request->getData());
            if ($this->CartProducts->save($cartProduct)) {
                $this->Flash->success(__('The cart product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cart product could not be saved. Please, try again.'));
        }
        $carts = $this->CartProducts->Carts->find('list', ['limit' => 200]);
        $products = $this->CartProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('cartProduct', 'carts', 'products'));
        $this->set('_serialize', ['cartProduct']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cart Product id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cartProduct = $this->CartProducts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cartProduct = $this->CartProducts->patchEntity($cartProduct, $this->request->getData());
            if ($this->CartProducts->save($cartProduct)) {
                $this->Flash->success(__('The cart product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cart product could not be saved. Please, try again.'));
        }
        $carts = $this->CartProducts->Carts->find('list', ['limit' => 200]);
        $products = $this->CartProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('cartProduct', 'carts', 'products'));
        $this->set('_serialize', ['cartProduct']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cart Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cartProduct = $this->CartProducts->get($id);
        if ($this->CartProducts->delete($cartProduct)) {
            $this->Flash->success(__('The cart product has been deleted.'));
        } else {
            $this->Flash->error(__('The cart product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
