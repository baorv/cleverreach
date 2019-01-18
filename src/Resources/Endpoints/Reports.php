<?php

namespace Baorv\CleverReach\Resources\Endpoints;

use Baorv\CleverReach\Exceptions\CleverReachException;
use Baorv\CleverReach\Resources\Resource;

class Reports extends Resource
{

    /**
     * Get all reports
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/reports-v3/list_get
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function all(array $params = []): array
    {
        return $this->httpClient->get('/v3/reports.json', $params);
    }

    /**
     * Get a certain report
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/reports-v3/retrieve_get
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function get(string $id): array
    {
        return $this->httpClient->get("/v3/reports.json/{$id}");
    }

    /**
     * Get informations about receivers
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/reports-v3/userReceived_get
     * @param string $id
     * @param string $state
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function receivers(string $id, string $state, array $params = []): array
    {
        return $this->httpClient->get("/v3/reports.json/{$id}/receivers/{$state}", $params);
    }

    /**
     * Get statistics for a certain report
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/reports-v3/stats_get
     * @param string $id
     * @param string $mode
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function stats(string $id, string $mode, array $params = []): array
    {
        return $this->httpClient->get("/v3/reports.json/{$id}/stats/{$mode}", $params);
    }

    /**
     * Delete certain report
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/reports-v3/remove_delete
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function delete(string $id): array
    {
        return $this->httpClient->delete("/v3/reports.json/{$id}");
    }
}