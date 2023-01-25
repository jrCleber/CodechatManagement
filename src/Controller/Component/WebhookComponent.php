<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;
use Cake\Http\Client;
use CURLFile;
use http\Url;
use HTTP_Request2;

class WebhookComponent extends Component
{

    public function message($servidor,$api,$instancia,$content,$numero){
        $numero = str_replace('+','',$numero);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $servidor.'/message/sendText/'.$instancia,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
  "number": "'.$numero.'",
  "options": {
    "delay": 2200
  },
  "textMessage": {
    "text": "'.$content.'"
  }
}',
            CURLOPT_HTTPHEADER => array(
                'apikey: '.$api,
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }


public function mediamessage($servidor,$api,$instancia,$mediaURL,$content,$tipoMedia,$numero){

    $numero = str_replace('+','',$numero);
    $mediaName = $ultimas = substr("$mediaURL", -3);
    if ($mediaName == 'oga'){
        $mediaName = 'mp3';
        $mediaURL = str_replace('.oga','.mp3',"$mediaURL");
    }
    if ($tipoMedia == 'file'){
        $tipoMedia = 'document';
    }
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $servidor.'/message/sendMedia/'.$instancia,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
  "number": "'.$numero.'",
  "options": {
    "delay": 1200
  },
  "mediaMessage": {
    "mediatype": "'.$tipoMedia.'",
    "fileName": "media.'.$mediaName.'",
    "caption": "'.$content.'",
    "media": "'.$mediaURL.'"
  }
}',
        CURLOPT_HTTPHEADER => array(
            'apikey: '.$api,
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;


}


function _urlchatwoot()
{
        return Configure::read('chatwoot.url');
}

function _thisUrl(){
        return Configure::read('this.url');
}



    function _downloadmedia($url,$instancia,$idmedia,$apicodechat)
    {

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url.'/chat/getBase64FromMediaMessage/' . $instancia,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
  "key": {
    "id": "' . $idmedia . '"
  }
}',
            CURLOPT_HTTPHEADER => array(
                'apikey: '.$apicodechat,
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);

        $ext = explode("/", "$response->mimetype");
        $ext = $ext[1];

        /*        header("Content-Type: $response->mimetype");
               // header("Content-Disposition: inline;");
                echo file_get_contents("data://$response->mimetype;base64,".$response->base64);*/

        $decoded = base64_decode($response->base64);
        $file = 'file.' . $ext;
        file_put_contents($file, $decoded);

        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: ' . $response->mimetype);
            header('Content-Disposition: attachment; filename="' . basename($file) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);

        }
 /*$diretorio = 'temp/teste.png';
            $fp = fopen($diretorio,"wb");
            fwrite($fp,readfile($file));
            fclose($fp);

            return 'ok';*/
        //  $media = base64_decode($response->base64);
        //   echo $media.'jpeg';
    }






public function sendMedia($account,$idconversa,$message,$api,$apiServidor,$codechatURL,$instancia){



    //    $media = $this->_downloadmedia($codechatURL,$instancia,$message['data']['key']['id'],$apiServidor);
         $media = $message['data']['key']['id'];
         $dados = base64_encode("$apiServidor&&$codechatURL&&$instancia&&$media");

         $urlmidia = $this->_thisUrl().'/webhook/chatwoot/download/'.$dados;

         $caption = false;
        $mesagemtipo = $message['data']['message'];
         if (array_key_exists('imageMessage', $mesagemtipo)){
             $tipo = 'image';
             $mimetype = $message['data']['message']['imageMessage']['mimetype'];
             if (array_key_exists('caption',$message['data']['message']['imageMessage'])){
                 $caption = $message['data']['message']['imageMessage']['caption'];
             }
         }
    if (array_key_exists('videoMessage', $mesagemtipo)){
        $tipo = 'video';
        $mimetype = $message['data']['message']['videoMessage']['mimetype'];
        if (array_key_exists('caption',$message['data']['message']['videoMessage'])){
            $caption = $message['data']['message']['videoMessage']['caption'];
        }
    }
    if (array_key_exists('documentMessage', $mesagemtipo)){
        $tipo = 'file';
        $mimetype = $message['data']['message']['documentMessage']['mimetype'];
        if (array_key_exists('caption',$message['data']['message']['documentMessage'])){
            $caption = $message['data']['message']['documentMessage']['caption'];
        }
    }
    if (array_key_exists('audioMessage', $mesagemtipo)){
        $tipo = 'audio';
        $mimetype = $message['data']['message']['audioMessage']['mimetype'];
        if (array_key_exists('caption',$message['data']['message']['audioMessage'])){
            $caption = $message['data']['message']['audioMessage']['caption'];
        }
    }
    if (array_key_exists('stickerMessage', $mesagemtipo)){
        $tipo = 'audio';
        $mimetype = $message['data']['message']['stickerMessage']['mimetype'];
        if (array_key_exists('caption',$message['data']['message']['stickerMessage'])){
            $caption = $message['data']['message']['stickerMessage']['caption'];
        }
    }


    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $this->_urlchatwoot().'/api/v1/accounts/'.$account.'/conversations/'.$idconversa.'/messages',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('attachments[]'=> new CURLFILE($urlmidia,$mimetype),'content' => $caption,'message_type' => 'incoming','file_type' => $tipo),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: multipart/form-data; boundary=----WebKitFormBoundary',
            'api_access_token: '.$api
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
  //  return $response;





}



    public function searchconv($api,$inbox,$account){

        $http = new Client([
            'headers' => ['api_access_token' => $api]
        ]);
        $response = $http->get($this->_urlchatwoot().'/api/v1/accounts/'.$account.'/conversations?inbox_id='.$inbox.'&status=all');
        //return $response->getJson();
         return $response->getStringBody();
    }

public function sendText($api,$account,$IDConversa,$mensagem, $fromMe = false){


    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $this->_urlchatwoot().'/api/v1/accounts/'.$account.'/conversations/'.$IDConversa.'/messages',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
	"content":"'.$mensagem.'",
	"message_type": "incoming"
}',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'api_access_token: '.$api
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;

    }


public function checkContact($conta,$numero,$api){


    $http = new Client([
        'headers' => ['api_access_token' => $api]
    ]);
    $response = $http->get(
        $this->_urlchatwoot().'/api/v1/accounts/'.$conta.'/contacts/search',
        ['q' => $numero],
        ['type' => 'json']
    );

    return $response->getJson();

}

function _photoProfile($api,$number,$url,$instance){

    $http = new Client([
        'headers' => ['apikey' => $api]
    ]);
    $number = str_replace('+','',$number);
    $response = $http->post(
        $url.'/chat/fetchProfilePictureUrl/'.$instance,
        ['number' => $number],
        ['type' => 'json']
    );
    return $response->getJson();

}
public function createContact($conta,$numero,$api, $nome,$api_serverZAP,$urlZap,$instance){

        $photo = $this->_photoProfile($api_serverZAP,$numero,$urlZap,$instance);
        $avatar = $photo['profilePictureUrl'];
        $novoContatoJson = '{"name": "'.$nome.'","phone_number": "'.$numero.'","avatar_url": "'.$avatar.'"}';

        $array = array('name' => $nome, 'phone_number' => $numero, 'avatar_url' => $avatar);




    $http = new Client([
        'headers' => ['api_access_token' => $api]
    ]);
    $response = $http->post(
        $this->_urlchatwoot().'/api/v1/accounts/'.$conta.'/contacts',
        json_encode($array),
        ['type' => 'json']
    );

    if ($response->isOk()){
        return $response->getJson();
    }else{
        return null;
    }
}

public function createConversation($account, $api, $inbox, $contato, $numero){

    $array = array('inbox_id' => $inbox, 'contact_id' => $contato);

    $http = new Client([
        'headers' => ['api_access_token' => $api]
    ]);
    $response = $http->post(
        $this->_urlchatwoot().'/api/v1/accounts/'.$account.'/conversations',
        json_encode($array),
        ['type' => 'json']
    );

    if ($response->isOk()){
        return $response->getJson();
    }else{
        return null;
    }



    }


}
