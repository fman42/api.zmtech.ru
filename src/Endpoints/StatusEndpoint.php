<?php

namespace ZMTechAPI\Endpoints;

use ZMTechAPI\Clients\AuthClient;
use ZMTechAPI\Schemes\{HttpRequest, APIResponse};
use ZMTechAPI\Tools\AuthHttpSender;

class StatusEndpoint
{
    private $httpSender;

    public function __construct(AuthClient $client)
    {
        $this->httpSender = new AuthHttpSender($client);
    }

    /**
     * Get statuses of sended messages
     *
     * @return APIResponse
     */
    public function getStatuses()
    {
        $request = new HttpRequest('/statuses', []);
        return $this->httpSender->sendPostRequest($request);
    }
}