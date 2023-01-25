<?php


namespace App\Controller;

use Cake\Core\Configure;
use Cake\ORM\TableRegistry;


/**
 * CodeChats Controller
 *
 * @property \App\Model\Table\CodeChatsTable $CodeChats
 * @method \App\Model\Entity\CodeChat[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CodeChatsController extends AppController
{

    public function initialize(): void
    {
        $this->loadComponent('Codechat');
        $this->loadComponent('Flash');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users','Servers'],
        ];
        $codeChats = $this->paginate($this->CodeChats);

        $this->set(compact('codeChats'));
    }

    /**
     * View method
     *
     * @param string|null $id Code Chat id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $codeChat = $this->CodeChats->get($id, [
            'contain' => ['Users', 'Servers', 'Chatwoots'],
        ]);


        $servidor = TableRegistry::getTableLocator()->get('Servers')->find('all')->where(['id' => $codeChat->server_id])->first();

        $url = $servidor->url;
        $api = $servidor->api_geral;
        $instancia = $codeChat->api_key;

        $check = $this->Codechat->checkconnection($url, $api, $instancia);

        if ($check == null) {
            $novaInstancia = '{"instanceName": "' . $instancia . '"}';
            $restaurar = $this->Codechat->newinstance($url, $api, $novaInstancia);

            $codechatTable = $this->getTableLocator()->get('CodeChats');
            $chat = $codechatTable->get($id); // Return article with id 12

            if (!null) {
                if (array_key_exists('apikey', $restaurar['hash'])) {
                    $codeChat->api = $restaurar['hash']['apikey'];
                } else {
                    $codeChat->api = $restaurar['hash']['jwt'];
                }
                $codechatTable->save($chat);

                sleep(2);
            }
        }
            $conexao = $this->Codechat->checkconnection($url, $api, $instancia);
            $this->set(compact('codeChat', 'conexao'));
        }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $codeChat = $this->CodeChats->newEmptyEntity();
        if ($this->request->is('post')) {
            $codeChat = $this->CodeChats->patchEntity($codeChat, $this->request->getData());
            $server_id = $this->request->getData()['server_id'];
            $servidor = TableRegistry::getTableLocator()->get('Servers')->find('all')->where(['id' => $server_id])->first();
            $servidor_url = $servidor->url;
            $servidor_api = $servidor->api_geral;

            $nova_api = uniqid(rand(20,30), true);
            $nova_api = md5($nova_api);
            $codeChat->api_key = $nova_api;
            $novaInstancia =  '{"instanceName": "'.$nova_api.'"}';
            $nova_instancia = $this->Codechat->newinstance($servidor_url,$servidor_api,$novaInstancia);

            if (!null){
                if (array_key_exists('apikey',$nova_instancia['hash'])){
                     $codeChat->api = $nova_instancia['hash']['apikey'];
                }else{
                    $codeChat->api = $nova_instancia['hash']['jwt'];
                }
             if ($this->CodeChats->save($codeChat)) {
                            $this->Flash->success(__('The code chat has been saved.'));
                            return $this->redirect(['action' => 'index']);
                        }
            }
            $this->Flash->error(__('The code chat could not be saved. Please, try again.'));
        }
        $users = TableRegistry::getTableLocator()->get('CakeDC/Users.Users')->find('list');
        $servers = $this->CodeChats->Servers->find('list', ['limit' => 200])->all();
        $this->set(compact('codeChat', 'users', 'servers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Code Chat id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        return $this->redirect(['action' => 'index']);
       /* $codeChat = $this->CodeChats->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $codeChat = $this->CodeChats->patchEntity($codeChat, $this->request->getData());
            if ($this->CodeChats->save($codeChat)) {
                $this->Flash->success(__('The code chat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The code chat could not be saved. Please, try again.'));
        }
        $users = TableRegistry::getTableLocator()->get('CakeDC/Users.Users')->find('all')->all();
       // $users = $this->CodeChats->Users->find('list', ['limit' => 200])->all();
        $servers = $this->CodeChats->Servers->find('list', ['limit' => 200])->all();
        $this->set(compact('codeChat', 'users', 'servers'));*/
    }

    /**
     * Delete method
     *
     * @param string|null $id Code Chat id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $codeChat = $this->CodeChats->get($id);


        $servidor = TableRegistry::getTableLocator()->get('Servers')->find('all')->where(['id' => $codeChat->server_id])->first();
        $teste = $this->Codechat->deleteinstance($servidor->url,$servidor->api_geral,$codeChat->api_key);

        if ($this->CodeChats->delete($codeChat)) {
            $this->Flash->success(__('The code chat has been deleted.'));
        } else {
            $this->Flash->error(__('The code chat could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }


    public function connectchatwoot($id = null){
        $codeChat = $this->CodeChats->get($id);
        $this->set(compact('codeChat'));
    }

    public function chatwoot(){
         if ($this->request->is('post')) {
                    $dados = $this->request->getData();
                    $name = $dados['inbox_name'];
                    $api_user_token = $dados['user_token_api'];
                    $account_chatwoot = $dados['account_chatwot'];

             $codeChat = $this->CodeChats->get($dados['idCodechat']);
                    $criarDados = $this->Codechat->newChatwoot($name,$codeChat->api_key,$api_user_token,$account_chatwoot);

                    if(array_key_exists('id',$criarDados)){

                        $chatwootTable = $this->getTableLocator()->get('Chatwoots');
                        $chat = $chatwootTable->newEmptyEntity();
                        $chat->code_chat_id = $dados['idCodechat'];
                        $chat->inbox = $criarDados['id'];
                        $chat->user_api = $api_user_token;
                        $chat->account_id = $account_chatwoot;
                        $chat->json = $criarDados;

                        if ($chatwootTable->save($chat)) {
                            $this->Flash->success(__('The Chatwoot has been Saved.'));

                        } else {
                            $this->Flash->error(__('The chatwoot could not be deleted. Please, try again.'));

                        }
                        return $this->redirect(['action' => 'view/'.$dados['idCodechat']]);

                    }
             $this->Flash->error(__('The code chat could not be deleted. Please, try again.'));
             return $this->redirect(['action' => 'view'.$dados['idCodechat']]);
         }

    }

    public function qrcode($id = null)
    {
        $codeChat = $this->CodeChats->get($id);
        $servidor = TableRegistry::getTableLocator()->get('Servers')->find('all')->where(['id' => $codeChat->server_id])->first();

        $url = $servidor->url;
        $api = $servidor->api_geral;
        $instancia = $codeChat->api_key;

        $conexao = $this->Codechat->checkconnection($url,$api,$instancia);

        sleep(1);

        if($conexao['state'] == 'open'){
            return $this->redirect(['action' => 'view/'.$id]);
        }else{
            $conectar = $this->Codechat->connectinstance($url,$api,$instancia);

                    $img = $conectar['base64'];
                    echo '<img src="'.$img.'" alt="Minha Figura">';

                    echo '<script>setTimeout(() => {
              document.location.reload();
            }, 10000); </script>';

                    die();
        }

    }
}
