<?php

namespace ZMTechAPI\Clients;

class AuthClient extends Client
{
    private $id;

    private $password;

    private $baseUri;

    /**
     * Init AuthClient instance
     *
     * @param string $id
     * @param string $password
     * @param string $baseUri
     */
    public function __construct($id, $password, $baseUri = 'https://api.zmtech.ru:7778/v1')
    {
        $this->id = $id;
        $this->password = $password;
        $this->baseUri = $baseUri;
    }

    /**
     *
     * @return string
     */
    public function getBaseUri()
    {
        return $this->baseUri;
    }

    /**
     * 
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
}