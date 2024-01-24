<?php

namespace App\Services;

use App\Classes\Agrisk\Apiary\ApiaryTerms;
use Illuminate\Support\Facades\Http;
use App\Classes\Agrisk\Apiary\ApiaryClientes as Agrisk;
use App\Classes\Agrisk\Apiary\ApiaryError;
use App\Classes\Agrisk\Apiary\ApiaryClient;
use App\Models\Cliente;

class AgriskService
{

    private $api;
    private $logging = true;

    public function __construct(){
        $this->api = new Agrisk();
    }

    public function createClient($taxId, $birthDate){
        // Log the message "CREATE CLIENT"
        $this->logging('CREATE CLIENT');
        
        // Call the "createClient" method of the "api" object with $taxId and $birthDate as parameters
        // Store the response in the variable $response
        $response = $this->api->createClient($taxId, $birthDate);
        
        // Log a message with details about the client creation attempt and the response body
        $this->logging("Tentativa de criação do cliente " . ((session()->get("cliente")) ? session()->get('cliente')['nome_dono'] : '') . " na Agrisk, obtendo retorno: " . $response->body(), 'discord');
        
        // Log the response body after decoding it from JSON to an associative array
        $this->logging(json_decode($response->body(), true));
        
        // Get the object representation of the response
        $object = $response->object();
        
        // Check if the response has an error
        if($this->checkError($object)){
            if(!isset($object->clientId)){
                // If the response does not have a clientId, set the error status code to the value of the statusCode property in the object, or default to 500 if not set
                $errorStatus = $object->statusCode ?? 500;
                // If the response does not have a message, set the error message to the value of the message property in the object, or default to ['Não foi possível realizar seu cadastro. Verifique seu CPF e data de nascimento ou fale com um de nosso assessores.'] if not set
                $errorMessages = $object->message ?? ['Não foi possível realizar seu cadastro. Verifique seu CPF e data de nascimento ou fale com um de nosso assessores.'];
                // Call the "generateError" method with the error status code and messages
                return $this->generateError($errorStatus, $errorMessages);
            }else{
                // If the response has error, but has clientId, create a new ApiaryClient object with the clientId
                // If the clientId is not set, call the "generateError" method with 500 as the error status code and ['Não foi possível realizar seu cadastro. Verifique seu CPF e data de nascimento ou fale com um de nosso assessores.'] as the error messages
                return new ApiaryClient($object->clientId);
            }
        }else{
            if(isset($object->id)){
                return new ApiaryClient($object->id);
            }else{
                // If the response do not has error, create a new ApiaryClient object with the id
            // If the id is not set, call the "generateError" method with 500 as the error status code and ['Não foi possível realizar seu cadastro. Verifique seu CPF e data de nascimento ou fale com um de nosso assessores.'] as the error messages
            return (isset($object->clientId)) ? new ApiaryClient($object->clientId) : $this->generateError(500, ['Não foi possível realizar seu cadastro. Verifique seu CPF e data de nascimento ou fale com um de nosso assessores.']);
            }
        }
    }

    public function clientDetail($id){
        // Log the message 'CLIENT DETAIL'
        $this->logging('CLIENT DETAIL');

        // Call the 'clientDetail' method of the 'api' object with the given ID and store the response
        $response = $this->api->clientDetail($id);

        // Log the message 'Tentativa de detalhes de cliente na Agrisk, obtendo retorno: ' followed by the body of the response
        $this->logging("Tentativa de detalhes de cliente na Agrisk, obtendo retorno: " . $response->body(), 'discord');

        // Log the JSON-decoded body of the response
        $this->logging(json_decode($response->body(), true));

        // Get the object representation of the response
        $object = $response->object();

        // Check if there is an error in the object
        if($this->checkError($object)){
            // If there is an error, get the error status code and error messages
            $errorStatus = $object->statusCode ?? 500;
            $errorMessages = $object->message ?? ['Não foi possível realizar seu cadastro. Verifique seu CPF e data de nascimento ou fale com um de nosso assessores.'];
            
            // Generate and return an error using the error status code and error messages
            return $this->generateError($errorStatus, $errorMessages);
        }else{
            // If there is no error, create a new 'ApiaryClient' object using the properties of the object and return it
            return new ApiaryClient($object->id, $object->taxId, $object->name, $object->taxIdStatus, $object->lastUpdateDate);
        }
    }

    public function createTerms(ApiaryClient $client){
        // Logging the action of creating terms
        $this->logging('CREATE TERMS');

        // Calling the createTerms method of the API class with the client's ID, name, and tax ID as parameters
        $response = $this->api->createTerms($client->id, $client->name, $client->taxId);

        // Logging the attempt to create terms in Agrisk for the client, along with the response from the API
        $this->logging("Tentativa de criação de termos na Agrisk pro cliente " . $client->name . " , obtendo retorno: " . $response->body(), 'discord');

        // Logging the response body as a JSON-decoded object
        $this->logging(json_decode($response->body(), true));

        // Accessing the response object
        $object = $response->object();

        // Checking if the response contains a "detail" property
        if(isset($object->detail)){
            // If a "detail" property exists, assign the value of the "statusCode" property to $errorStatus, or 500 if it doesn't exist
            $errorStatus = $object->statusCode ?? 500;

            // Assign the value of the "message" property to $errorMessages, or ['CPF ou CNPJ inválido.'] if it doesn't exist
            $errorMessages = $object->message ?? ['CPF ou CNPJ inválido.'];

            // Generating an error response with the error status and messages
            return $this->generateError($errorStatus, $errorMessages);
        }

        // Returning the response object
        return $response->object();
    }

    public function termsDetail($termId){
        $this->logging('TERMS DETAIL');
        $response = $this->api->termsDetail($termId);
        $this->logging("Tentativa de detalhes de termos na Agrisk para o cliente, obtendo retorno: " . $response->body(), 'discord');
        $this->logging(json_decode($response->body(), true));

        // Accessing the response object
        $object = $response->object();

        // Checking if the response contains a "detail" property
        if(isset($object->detail)){
            // If a "detail" property exists, assign the value of the "statusCode" property to $errorStatus, or 500 if it doesn't exist
            $errorStatus = $object->statusCode ?? 500;

            // Assign the value of the "message" property to $errorMessages, or ['Termo não encontrado.'] if it doesn't exist
            $errorMessages = $object->message ?? ['Termo não encontrado.'];

            // Generating an error response with the error status and messages
            return $this->generateError($errorStatus, $errorMessages);
        }

        if(isset($object->message)){
            // If a "detail" property exists, assign the value of the "statusCode" property to $errorStatus, or 500 if it doesn't exist
            $errorStatus = $object->statusCode ?? 500;

            // Assign the value of the "message" property to $errorMessages, or ['Erro ao gerar o termo.'] if it doesn't exist
            $errorMessages = $object->message ?? ['Erro ao gerar o termo.'];

            // Generating an error response with the error status and messages
            return $this->generateError($errorStatus, $errorMessages);
        }

        return new ApiaryTerms($object->termId, $object->companyName, $object->clientName, $object->term, $object->questions);
    }

    public function sendAnswers($termId, $respostas){
        $data = [];
        
        foreach($respostas as $id => $valor){
            $data[] = [
                "id" => $id,
                "answer" => $valor
            ];
        }

        $this->logging('SEND ANSWERS');
        
        $response = $this->api->sendAnswers($termId, $data);
        
        $this->logging("Tentativa de envio de respostas de termos na Agrisk , obtendo retorno: " . $response->body(), 'discord');
        $this->logging(json_decode($response->body(), true));

        $object = $response->object();

        if($object->message == "Approved"){
            $cliente = Cliente::find(session()->get('cliente')['id']);
            $cliente->agriskTermosRespondido = true;
            $cliente->save();
            $token = $cliente->agriskTermosToken;
            $telefone = $cliente->telefone;
            $this->api->sendTermsToken($token, $telefone);
            return true;
        }else{
            $errorStatus = 500;
            $errorMessages = ['As questões foram respondidas incorretamente'];
            return $this->generateError($errorStatus, $errorMessages);
        }
    }

    public function sendTermsToken($token, $telefone){
        $this->logging('SEND TERMS TOKEN');
        $response = $this->api->sendTermsToken($token, $telefone);
        $this->logging("Tentativa de envio de token pro whatsapp na Agrisk , obtendo retorno: " . $response->body(), 'discord');
        $this->logging(json_decode($response->body(), true));
        if(!$response->object()){
            return true;
        }else{
            return false;
        }
    }

    public function verificarCodigo($token, $otpToken, $deviceCode){
        $this->logging('VERIFY CODE');
        $response = $this->api->verificarCodigo($token, $otpToken, $deviceCode);
        $this->logging("Tentativa de verificação de código na Agrisk , obtendo retorno: " . $response->body(), 'discord');
        $this->logging(json_decode($response->body(), true));
        if($response->object() == "Term signed"){
            return true;
        }else{
            return false;
        }
    }

    public function getTermsAuthorizationToken($termUrl){
        $response = $this->api->getTermsAuthorizationToken($termUrl);
        return $response;
    }

    public function checkError($response){
        if(isset($response->statusCode) || (isset($response->status) && $response->status == 'error')){
            return true;
        }else{
            return false;
        }
    }

    public function generateError($status, $messages){
        return new ApiaryError($status, $messages);
    }

    public function logging($msg, $channel = 'files'){
        if(!$this->logging) return;
        switch($channel){
            case('files'):
                \Log::channel("agrisk_debug")->debug($msg);
                break;
            case('discord'):
                \DiscordAlert::to('agrisk')->message($msg);
                break;
        }
        
    }
}
