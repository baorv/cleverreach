<?php

namespace Baorv\CleverReach\Resources\Endpoints;

use Baorv\CleverReach\Exceptions\CleverReachException;
use Baorv\CleverReach\Resources\Resource;

class MyContent extends Resource
{

    /**
     * Gets a list of all "my content" items
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/mycontent-v3/list_get
     * @return array
     * @throws CleverReachException
     */
    public function all(): array
    {
        return $this->httpClient->get('/v3/mycontent.json');
    }

    /**
     * Gets a certain "my content" item by id
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/mycontent-v3/retrieve_get
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function get(string $id): array
    {
        return $this->httpClient->get("/v3/mycontent.json/{$id}");
    }

    /**
     * Adds a new "my content" item
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/mycontent-v3/create_post
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function create(array $params): array
    {
        return $this->httpClient->post('/v3/mycontent.json', $params);
    }

    /**
     * Modifies an existing "my content" item
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/mycontent-v3/update_put
     * @param string $id
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function update(string $id, array $params = []): array
    {
        return $this->httpClient->put("/v3/mycontent.json/{$id}", $params);
    }

    /**
     * Delete my content
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/mycontent-v3/remove_delete
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function delete(string $id): array
    {
        return $this->httpClient->delete("/v3/mycontent.json/{$id}");
    }
}