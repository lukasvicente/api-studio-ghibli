<?php


namespace App\Services;


use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Message\Response;

class Api
{
    private $client;
    private $apiUrl;
    private $endPoint;

    public function __construct()
    {
        $this->apiUrl = "https://ghibliapi.herokuapp.com/";
        $this->client = new Client(['base_uri' => $this->apiUrl]);

    }


    public function getEndPoint(String $value)
    {

        try {

            $this->endPoint = $value;
            $response = $this->client->request('GET',$this->endPoint);

            $body = $response->getBody();


            return json_decode($body);

        }catch (\Exception $e){

            $response = array('status' => 'fail', 'error' => $e->getMessage());

            return $response;

        }


    }


}
