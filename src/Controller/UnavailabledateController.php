<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Unavailabledate Controller
 *
 * @property \App\Model\Table\UnavailabledateTable $Unavailabledate
 */
class UnavailabledateController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $unavailabledate = $this->paginate($this->Unavailabledate);

        $this->set(compact('unavailabledate'));
        $this->set('_serialize', ['unavailabledate']);
    }

    /**
     * View method
     *
     * @param string|null $id Unavailabledate id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $unavailabledate = $this->Unavailabledate->get($id, [
            'contain' => []
        ]);

        $this->set('unavailabledate', $unavailabledate);
        $this->set('_serialize', ['unavailabledate']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $unavailabledate = $this->Unavailabledate->newEntity();
        if ($this->request->is('post')) {
            $unavailabledate = $this->Unavailabledate->patchEntity($unavailabledate, $this->request->getData());
            if ($this->Unavailabledate->save($unavailabledate)) {
                $this->Flash->success(__('The unavailabledate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The unavailabledate could not be saved. Please, try again.'));
        }
        $this->set(compact('unavailabledate'));
        $this->set('_serialize', ['unavailabledate']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Unavailabledate id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $unavailabledate = $this->Unavailabledate->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $unavailabledate = $this->Unavailabledate->patchEntity($unavailabledate, $this->request->getData());
            if ($this->Unavailabledate->save($unavailabledate)) {
                $this->Flash->success(__('The unavailabledate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The unavailabledate could not be saved. Please, try again.'));
        }
        $this->set(compact('unavailabledate'));
        $this->set('_serialize', ['unavailabledate']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Unavailabledate id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $unavailabledate = $this->Unavailabledate->get($id);
        if ($this->Unavailabledate->delete($unavailabledate)) {
            $this->Flash->success(__('The unavailabledate has been deleted.'));
        } else {
            $this->Flash->error(__('The unavailabledate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
