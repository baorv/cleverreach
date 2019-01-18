<?php

namespace Baorv\CleverReach\Resources\Endpoints;

use Baorv\CleverReach\Exceptions\CleverReachException;
use Baorv\CleverReach\Resources\Resource;

class Attributes extends Resource
{

    /**
     * Return local or global attributes
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/attributes-v3/list_get
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function attributes(array $params = []): array
    {
        return $this->httpClient->get('/v3/attributes.json', $params);
    }

    /**
     * Return a attribute
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/attributes-v3/retrieve_get
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function get(string $id): array
    {
        return $this->httpClient->get("/v3/attributes.json/{$id}");
    }

    /**
     * Create attribute
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/attributes-v3/create_post
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function create(array $params = []): array
    {
        return $this->httpClient->post('/v3/attributes.json', $params);
    }

    /**
     * Update attribute
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/attributes-v3/update_attr_put
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function update(string $id): array
    {
        return $this->httpClient->put("/v3/attributes.json/{$id}", $id);
    }

    /**
     * Delete attribute
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/attributes-v3/remove_delete
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function delete(string $id): array
    {
        return $this->httpClient->delete("/v3/attributes.json/{$id}");
    }
}