<?php

namespace ZMTechAPI\Endpoints;

use ZMTechAPI\Clients\AuthClient;
use ZMTechAPI\Schemes\{HttpRequest, APIResponse};
use ZMTechAPI\Tools\AuthHttpSender;

class AccountEndpoint
{
    private $httpSender;

    public function __construct(AuthClient $client)
    {
        $this->httpSender = new AuthHttpSender($client);
    }

    /**
     * Return an account info from API
     *
     * @return APIResponse
     */
    public function getAccountInfo()
    {
        $request = new HttpRequest('/', []);
        return $this->httpSender->sendPostRequest($request);
    }
}