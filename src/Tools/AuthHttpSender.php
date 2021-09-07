<?php

namespace ZMTechAPI\Tools;

use ZMTechAPI\Clients\AuthClient;
use ZMTechAPI\Schemes\{HttpRequest, APIResponse};

class AuthHttpSender
{
    private $client;

    public function __construct(AuthClient $client)
    {
        $this->client = $client;
    }

    public function sendPostRequest(HttpRequest $request)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "{$this->client->getBaseUri()}{$request->getUrl()}");
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);

        $params = array_merge($request->getArrayParams(), [
            'id' => $this->client->getId(),
            'password' => $this->client->getPassword()
        ]);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HEADER, 1);

        $response = curl_exec($curl);
        $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $body = substr($response, $header_size);
        $headers = substr($response, 0, $header_size);

        curl_close($curl);

        $res = new APIResponse();
        $res->result = true;
        $res->data = json_decode($body);
        $res->http_code = $http_code;

        if ($http_code !== 200 && $http_code !== 201) {
            $res->result = false;
        }

        return $res;
    }
}