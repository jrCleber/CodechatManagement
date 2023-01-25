<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Servers Controller
 *
 * @property \App\Model\Table\ServersTable $Servers
 * @method \App\Model\Entity\Server[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $servers = $this->paginate($this->Servers);

        $this->set(compact('servers'));
    }

    /**
     * View method
     *
     * @param string|null $id Server id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $server = $this->Servers->get($id, [
            'contain' => ['CodeChats'],
        ]);

        $this->set(compact('server'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $server = $this->Servers->newEmptyEntity();
        if ($this->request->is('post')) {
            $server = $this->Servers->patchEntity($server, $this->request->getData());
            if ($this->Servers->save($server)) {
                $this->Flash->success(__('The server has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The server could not be saved. Please, try again.'));
        }
        $this->set(compact('server'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Server id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $server = $this->Servers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $server = $this->Servers->patchEntity($server, $this->request->getData());
            if ($this->Servers->save($server)) {
                $this->Flash->success(__('The server has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The server could not be saved. Please, try again.'));
        }
        $this->set(compact('server'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Server id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $server = $this->Servers->get($id);
        if ($this->Servers->delete($server)) {
            $this->Flash->success(__('The server has been deleted.'));
        } else {
            $this->Flash->error(__('The server could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
