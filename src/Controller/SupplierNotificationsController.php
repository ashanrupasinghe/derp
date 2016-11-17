<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SupplierNotifications Controller
 *
 * @property \App\Model\Table\SupplierNotificationsTable $SupplierNotifications
 */
class SupplierNotificationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $supplierNotifications = $this->paginate($this->SupplierNotifications);

        $this->set(compact('supplierNotifications'));
        $this->set('_serialize', ['supplierNotifications']);
    }

    /**
     * View method
     *
     * @param string|null $id Supplier Notification id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $supplierNotification = $this->SupplierNotifications->get($id, [
            'contain' => []
        ]);

        $this->set('supplierNotification', $supplierNotification);
        $this->set('_serialize', ['supplierNotification']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $supplierNotification = $this->SupplierNotifications->newEntity();
        if ($this->request->is('post')) {
            $supplierNotification = $this->SupplierNotifications->patchEntity($supplierNotification, $this->request->data);
            if ($this->SupplierNotifications->save($supplierNotification)) {
                $this->Flash->success(__('The supplier notification has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The supplier notification could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('supplierNotification'));
        $this->set('_serialize', ['supplierNotification']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Supplier Notification id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $supplierNotification = $this->SupplierNotifications->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $supplierNotification = $this->SupplierNotifications->patchEntity($supplierNotification, $this->request->data);
            if ($this->SupplierNotifications->save($supplierNotification)) {
                $this->Flash->success(__('The supplier notification has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The supplier notification could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('supplierNotification'));
        $this->set('_serialize', ['supplierNotification']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Supplier Notification id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $supplierNotification = $this->SupplierNotifications->get($id);
        if ($this->SupplierNotifications->delete($supplierNotification)) {
            $this->Flash->success(__('The supplier notification has been deleted.'));
        } else {
            $this->Flash->error(__('The supplier notification could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
