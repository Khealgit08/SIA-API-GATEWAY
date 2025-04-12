<?php
namespace App\Traits;

// include the Guzzle Component Library
use GuzzleHttp\Client;

trait ConsumesExternalService {

    /**
    * Send a request to any service
    * @return string
    */
    // note form params and headers are optional
    public function performRequest($method,$requestUrl,$form_params =[],$headers =[]) {
        // create a new client request
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);

        if(isset($this->secret)) {
            $headers['Authorization'] = $this->secret;
        }

        $headers = array_merge([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ], $headers);
        
        // perform the request (method, url, formparameters, headers)
        $response = $client->request($method,$requestUrl,[
            'json' => $form_params, 
            'headers' =>$headers
        ]);

        // return the response body contents
        return $response->getBody()->getContents();
    }
}