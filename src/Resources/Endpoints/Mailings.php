<?php

namespace Baorv\CleverReach\Resources\Endpoints;

use Baorv\CleverReach\Exceptions\CleverReachException;
use Baorv\CleverReach\Resources\Resource;

class Mailings extends Resource
{
    /**
     * Returns lists of mailings according to following filter settings
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/mailings-v3/list_get
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function all(array $params = []): array
    {
        return $this->httpClient->get('/v3/mailings.json', $params);
    }

    /**
     * Get a mailing by id
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/mailings-v3/retrieve_get
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function get(string $id): array
    {
        return $this->httpClient->get("/v3/mailings.json/{$id}");
    }

    /**
     * Get a mailing by id
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/mailings-v3/retrieveLinks_get
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function links(string $id): array
    {
        return $this->httpClient->get("/v3/mailings.json/{$id}/links");
    }

    /**
     * Return a list of orders
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/mailings-v3/retrieveByMailing_get
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function orders(string $id): array
    {
        return $this->httpClient->get("/v3/mailings.json/{$id}/orders");
    }

    /**
     * Returns array of categories
     *
     * @return array
     * @throws CleverReachException
     */
    public function channel(): array
    {
        return $this->httpClient->get('/v3/mailings/channel.json');
    }

    /**
     * Get specific category
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/mailings-v3/retrieve__get
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function getChannel(string $id): array
    {
        return $this->httpClient->get("/v3/mailings/channel.json/{$id}");
    }

    /**
     * Create a new mailing
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/mailings-v3/create_post
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function create(array $params): array
    {
        return $this->httpClient->post('/v3/mailings.json', $params);
    }

    /**
     * Release a certain mailing to be sent either terminated or immediately
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/mailings-v3/startMailing_post
     * @param string $id
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function release(string $id, array $params = []): array
    {
        return $this->httpClient->post("/v3/mailings.json/{$id}/release", $params);
    }

    /**
     * Sends a preview mail of mailing with given id
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/mailings-v3/sendPreview_post
     * @param string $id
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function preview(string $id, array $params = []): array
    {
        return $this->httpClient->post("/v3/mailings.json/{$id}/sendpreview", $params);
    }

    /**
     * Aborts a previously released mailing
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/mailings-v3/stopMailing_post
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function stop(string $id): array
    {
        return $this->httpClient->post("/v3/mailings.json/{$id}/stop");
    }

    /**
     * Update a mailing
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/mailings-v3/update_put
     * @param string $id
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function update(string $id, array $params = []): array
    {
        return $this->httpClient->put("/v3/mailings.json/{$id}", $params);
    }

    /**
     * Deletes Category
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/mailings-v3/remove_delete
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function delete(string $id): array
    {
        return $this->httpClient->delete("/v3/mailings/channel.json/{$id}");
    }
}