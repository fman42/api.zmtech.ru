<?php

namespace ZMTechAPI;

use ZMTechAPI\Endpoints\AccountEndpoint;
use ZMTechAPI\Endpoints\StatusEndpoint;
use ZMTechAPI\Endpoints\SmsEndpoint;
use ZMTechAPI\Clients\{AuthClient, Client};

class ZMTech
{
    private $collectionEndpoint = [];

    public function __construct(Client $client)
    {
        if (!($client instanceof AuthClient)) {
            return;
        }

        $this->collectionEndpoint = [
            'account' => new AccountEndpoint($client),
            'status' => new StatusEndpoint($client),
            'sms' => new SmsEndpoint($client)
        ];
    }

    public function get(string $endpoint)
    {
        if (!array_key_exists($endpoint, $this->collectionEndpoint))
            return null;

        return $this->collectionEndpoint[$endpoint];
    }
}