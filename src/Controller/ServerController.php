<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
/**
 * Server Controller
 *
 * @method \App\Model\Entity\Server[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServerController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

    }

    /**
     * View method
     *
     * @param string|null $id Server id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     *
     */
    public function view($id = null)
    {
        $server = $this->Server->get($id, [
            'contain' => [],
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
        $server = $this->Server->newEmptyEntity();
        if ($this->request->is('post')) {
            $server = $this->Server->patchEntity($server, $this->request->getData());
            if ($this->Server->save($server)) {
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
        $server = $this->Server->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $server = $this->Server->patchEntity($server, $this->request->getData());
            if ($this->Server->save($server)) {
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
        $server = $this->Server->get($id);
        if ($this->Server->delete($server)) {
            $this->Flash->success(__('The server has been deleted.'));
        } else {
            $this->Flash->error(__('The server could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
