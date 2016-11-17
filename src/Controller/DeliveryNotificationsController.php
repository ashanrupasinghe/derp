<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DeliveryNotifications Controller
 *
 * @property \App\Model\Table\DeliveryNotificationsTable $DeliveryNotifications
 */
class DeliveryNotificationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $deliveryNotifications = $this->paginate($this->DeliveryNotifications);

        $this->set(compact('deliveryNotifications'));
        $this->set('_serialize', ['deliveryNotifications']);
    }

    /**
     * View method
     *
     * @param string|null $id Delivery Notification id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deliveryNotification = $this->DeliveryNotifications->get($id, [
            'contain' => []
        ]);

        $this->set('deliveryNotification', $deliveryNotification);
        $this->set('_serialize', ['deliveryNotification']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deliveryNotification = $this->DeliveryNotifications->newEntity();
        if ($this->request->is('post')) {
            $deliveryNotification = $this->DeliveryNotifications->patchEntity($deliveryNotification, $this->request->data);
            if ($this->DeliveryNotifications->save($deliveryNotification)) {
                $this->Flash->success(__('The delivery notification has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The delivery notification could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('deliveryNotification'));
        $this->set('_serialize', ['deliveryNotification']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Delivery Notification id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deliveryNotification = $this->DeliveryNotifications->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deliveryNotification = $this->DeliveryNotifications->patchEntity($deliveryNotification, $this->request->data);
            if ($this->DeliveryNotifications->save($deliveryNotification)) {
                $this->Flash->success(__('The delivery notification has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The delivery notification could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('deliveryNotification'));
        $this->set('_serialize', ['deliveryNotification']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Delivery Notification id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deliveryNotification = $this->DeliveryNotifications->get($id);
        if ($this->DeliveryNotifications->delete($deliveryNotification)) {
            $this->Flash->success(__('The delivery notification has been deleted.'));
        } else {
            $this->Flash->error(__('The delivery notification could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
