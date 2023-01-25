<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;
use Cake\Http\Client;


class CodechatComponent extends Component{

    function _chatwoot()
    {
        return Configure::read('chatwoot.url');
    }

    function _api()
    {
        return Configure::read('chatwoot.api_geral');
    }

    function _thisSite()
    {
        return Configure::read('this.url');
    }

    public function newChatwoot($name, $instancia, $api_chatwoot, $account_chatwoot){

        $json = '{
"name": "'.$name.'",
"channel": {
"type": "api",
"webhook_url": "'.$this->_thisSite()."/apis/webhook/$instancia".'"
}
}';

        $http = new Client(['headers' => ['api_access_token' => $api_chatwoot]
        ]);

        $response = $http->post(
            $this->_chatwoot()."/api/v1/accounts/$account_chatwoot/inboxes/",
            $json,
            ['type' => 'json']
        );

        if ($response->isOk()) {
            return $response->getJson();
        } else {
            $codigo = $response->getStatusCode();
            $json = $response->getJson();
            $respostaErro = array($codigo, $json);
            return $respostaErro;
        }



    }
    public function newinstance($url,$api,$instancia){

        $http = new Client([
            'headers' => ['apikey' => $api]
        ]);
        $response = $http->post($url.'/instance/create',
            $instancia,
            ['type' => 'json']
        );
        if($response->isOk()){
            return $response->getJson();
        }else{
            return null;
        }

    }

    public function checkconnection($url,$api,$instancia){

        $http = new Client([
            'headers' => ['apikey' => $api]
        ]);

        $response = $http->get($url.'/instance/connectionState/'.$instancia);
        if($response->isOk()){
            return $response->getJson();
        }else{
            return null;
        }

    }


    public function connectinstance($url,$api,$instancia){

        $http = new Client([
            'headers' => ['apikey' => $api]
        ]);

        $response = $http->get($url.'/instance/connect/'.$instancia);
        if($response->isOk()){
            return $response->getJson();
        }else{
            return null;
        }

    }

    public function deleteinstance($url,$api,$instancia){

        $http = new Client([
            'headers' => ['apikey' => $api]
        ]);

         $http->delete($url.'/instance/logout/'.$instancia);
         sleep(1);
        $http->delete($url.'/instance/delete/'.$instancia);

    }





}
