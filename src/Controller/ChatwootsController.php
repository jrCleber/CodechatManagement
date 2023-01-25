<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Chatwoots Controller
 *
 * @property \App\Model\Table\ChatwootsTable $Chatwoots
 * @method \App\Model\Entity\Chatwoot[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChatwootsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CodeChats'],
        ];
        $chatwoots = $this->paginate($this->Chatwoots);

        $this->set(compact('chatwoots'));
    }

    /**
     * View method
     *
     * @param string|null $id Chatwoot id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $chatwoot = $this->Chatwoots->get($id, [
            'contain' => ['CodeChats'],
        ]);

        $this->set(compact('chatwoot'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $chatwoot = $this->Chatwoots->newEmptyEntity();
        if ($this->request->is('post')) {
            $chatwoot = $this->Chatwoots->patchEntity($chatwoot, $this->request->getData());
            if ($this->Chatwoots->save($chatwoot)) {
                $this->Flash->success(__('The chatwoot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chatwoot could not be saved. Please, try again.'));
        }
        $codeChats = $this->Chatwoots->CodeChats->find('list', ['limit' => 200])->all();
        $this->set(compact('chatwoot', 'codeChats'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Chatwoot id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chatwoot = $this->Chatwoots->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chatwoot = $this->Chatwoots->patchEntity($chatwoot, $this->request->getData());
            if ($this->Chatwoots->save($chatwoot)) {
                $this->Flash->success(__('The chatwoot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chatwoot could not be saved. Please, try again.'));
        }
        $codeChats = $this->Chatwoots->CodeChats->find('list', ['limit' => 200])->all();
        $this->set(compact('chatwoot', 'codeChats'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Chatwoot id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chatwoot = $this->Chatwoots->get($id);
        if ($this->Chatwoots->delete($chatwoot)) {
            $this->Flash->success(__('The chatwoot has been deleted.'));
        } else {
            $this->Flash->error(__('The chatwoot could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
