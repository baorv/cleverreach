<?php

namespace Baorv\CleverReach\Resources;

use Baorv\CleverReach\Contracts\HttpClientContract;

class Resource
{

    /** @var HttpClientContract $httpClient */
    protected $httpClient;

    /**
     * Resource constructor.
     * @param HttpClientContract $httpClient
     */
    public function __construct(HttpClientContract $httpClient)
    {
        $this->httpClient = $httpClient;
    }
}