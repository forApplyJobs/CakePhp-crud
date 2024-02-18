<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Experiences Controller
 *
 * @property \App\Model\Table\ExperiencesTable $Experiences
 */
class ExperiencesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Experiences->find()
            ->contain(['Cvlist']);
        $experiences = $this->paginate($query);

        $this->set(compact('experiences'));
    }

    /**
     * View method
     *
     * @param string|null $id Experience id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $experience = $this->Experiences->get($id, contain: ['Cvlist']);
        $this->set(compact('experience'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $experience = $this->Experiences->newEmptyEntity();
        if ($this->request->is('post')) {
            $experience = $this->Experiences->patchEntity($experience, $this->request->getData());
            if ($this->Experiences->save($experience)) {
                $this->Flash->success(__('The experience has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The experience could not be saved. Please, try again.'));
        }
        $cvlist = $this->Experiences->Cvlist->find('list', limit: 200)->all();
        $this->set(compact('experience', 'cvlist'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Experience id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $experience = $this->Experiences->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $experience = $this->Experiences->patchEntity($experience, $this->request->getData());
            if ($this->Experiences->save($experience)) {
                $this->Flash->success(__('The experience has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The experience could not be saved. Please, try again.'));
        }
        $cvlist = $this->Experiences->Cvlist->find('list', limit: 200)->all();
        $this->set(compact('experience', 'cvlist'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Experience id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $experience = $this->Experiences->get($id);
        if ($this->Experiences->delete($experience)) {
            $this->Flash->success(__('The experience has been deleted.'));
        } else {
            $this->Flash->error(__('The experience could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
