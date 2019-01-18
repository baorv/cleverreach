<?php

namespace Baorv\CleverReach\Resources\Endpoints;

use Baorv\CleverReach\Exceptions\CleverReachException;
use Baorv\CleverReach\Resources\Resource;

class Debug extends Resource
{

    /**
     * Exchange calling token with a new one. The old one will be invalid then.
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/debug-v3/exchange_get
     * @return array
     * @throws CleverReachException
     */
    public function exchange(): array
    {
        return $this->httpClient->get('/v3/debug/exchange.json');
    }

    /**
     * Retrieve the ttl of the token
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/debug-v3/retrieveTTL_get
     * @return array
     * @throws CleverReachException
     */
    public function ttl(): array
    {
        return $this->httpClient->get('/v3/debug/ttl.json');
    }

    /**
     * Information about the current client
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/debug-v3/whoami_get
     * @throws CleverReachException
     */
    public function whoami(): array
    {
        return $this->httpClient->get('/v3/debug/whoami.json');
    }
}