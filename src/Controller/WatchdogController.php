<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Watchdog Controller
 *
 * @property \App\Model\Table\WatchdogTable $Watchdog
 */
class WatchdogController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $watchdog = $this->paginate($this->Watchdog);

        $this->set(compact('watchdog'));
        $this->set('_serialize', ['watchdog']);
    }

    /**
     * View method
     *
     * @param string|null $id Watchdog id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $watchdog = $this->Watchdog->get($id, [
            'contain' => []
        ]);

        $this->set('watchdog', $watchdog);
        $this->set('_serialize', ['watchdog']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $watchdog = $this->Watchdog->newEntity();
        if ($this->request->is('post')) {
            $watchdog = $this->Watchdog->patchEntity($watchdog, $this->request->data);
            if ($this->Watchdog->save($watchdog)) {
                $this->Flash->success(__('The watchdog has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The watchdog could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('watchdog'));
        $this->set('_serialize', ['watchdog']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Watchdog id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $watchdog = $this->Watchdog->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $watchdog = $this->Watchdog->patchEntity($watchdog, $this->request->data);
            if ($this->Watchdog->save($watchdog)) {
                $this->Flash->success(__('The watchdog has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The watchdog could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('watchdog'));
        $this->set('_serialize', ['watchdog']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Watchdog id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $watchdog = $this->Watchdog->get($id);
        if ($this->Watchdog->delete($watchdog)) {
            $this->Flash->success(__('The watchdog has been deleted.'));
        } else {
            $this->Flash->error(__('The watchdog could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
