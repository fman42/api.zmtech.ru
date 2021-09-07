<?php

namespace ZMTechAPI\Schemes;

class HttpRequest
{
    protected $url;

    protected $params = [];

    /**
     * Create HttpRequest instance
     *
     * @param string $url
     * @param array $params
     */
    public function __construct($url, $params)
    {
        $this->url = $url;
        $this->params = $params;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getArrayParams()
    {
        return $this->params;
    }
}