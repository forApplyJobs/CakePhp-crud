<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Bilka Controller
 *
 * @property \App\Model\Table\BilkaTable $Bilka
 */
class BilkaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Bilka->find();
        $bilka = $this->paginate($query);

        $this->set(compact('bilka'));
    }

    /**
     * View method
     *
     * @param string|null $id Bilka id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bilka = $this->Bilka->get($id, contain: []);
        $this->set(compact('bilka'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bilka = $this->Bilka->newEmptyEntity();
        if ($this->request->is('post')) {
            $bilka = $this->Bilka->patchEntity($bilka, $this->request->getData());
            if ($this->Bilka->save($bilka)) {
                $this->Flash->success(__('The bilka has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bilka could not be saved. Please, try again.'));
        }
        $this->set(compact('bilka'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bilka id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bilka = $this->Bilka->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bilka = $this->Bilka->patchEntity($bilka, $this->request->getData());
            if ($this->Bilka->save($bilka)) {
                $this->Flash->success(__('The bilka has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bilka could not be saved. Please, try again.'));
        }
        $this->set(compact('bilka'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bilka id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bilka = $this->Bilka->get($id);
        if ($this->Bilka->delete($bilka)) {
            $this->Flash->success(__('The bilka has been deleted.'));
        } else {
            $this->Flash->error(__('The bilka could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
