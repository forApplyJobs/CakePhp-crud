<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Infos Controller
 *
 * @property \App\Model\Table\InfosTable $Infos
 */
class InfosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Infos->find();
        $infos = $this->paginate($query);

        $this->set(compact('infos'));
    }

    /**
     * View method
     *
     * @param string|null $id Info id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $info = $this->Infos->get($id, contain: ['Cvlist']);
        $this->set(compact('info'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $info = $this->Infos->newEmptyEntity();
        if ($this->request->is('post')) {
            $info = $this->Infos->patchEntity($info, $this->request->getData(), [
                'accessibleFields' => ['header' => true, 'description' => true]
            ]);
            if ($this->Infos->save($info)) {
                $this->Flash->success(__('The info has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The info could not be saved. Please, try again.'));
        }
        $this->set(compact('info'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Info id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
{
    $info = $this->Infos->get($id, [
        'contain' => [],
    ]);
    if ($this->request->is(['patch', 'post', 'put'])) {
        $info = $this->Infos->patchEntity($info, $this->request->getData(), [
            'accessibleFields' => ['header' => true, 'description' => true]
        ]);
        if ($this->Infos->save($info)) {
            $this->Flash->success(__('The info has been saved.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The info could not be saved. Please, try again.'));
    }
    $this->set(compact('info'));
}

    /**
     * Delete method
     *
     * @param string|null $id Info id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $info = $this->Infos->get($id);
        if ($this->Infos->delete($info)) {
            $this->Flash->success(__('The info has been deleted.'));
        } else {
            $this->Flash->error(__('The info could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
