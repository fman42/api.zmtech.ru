<?php

namespace ZMTechAPI\Endpoints;

use ZMTechAPI\Clients\AuthClient;
use ZMTechAPI\Schemes\{HttpRequest, APIResponse};
use ZMTechAPI\Tools\AuthHttpSender;

class SmsEndpoint
{
    private $httpSender;

    public function __construct(AuthClient $client)
    {
        $this->httpSender = new AuthHttpSender($client);
    }

    /**
     * Send brand SMS
     *
     * @param array $brandSmsPack
     * @return APIResponse
     */
    public function sendBrandSms($brandSmsPack)
    {
        $request = new HttpRequest('/brand', [
            'pack' => $brandSmsPack
        ]);
        return $this->httpSender->sendPostRequest($request);
    }

    /**
     * Send neutral SMS
     *
     * @param array $neutralSmsPack
     * @return APIResponse
     */
    public function sendNeutralSms($neutralSmsPack)
    {
        $request = new HttpRequest('/neutral', [
            'pack' => $neutralSmsPack
        ]);
        return $this->httpSender->sendPostRequest($request);
    }
}