<?php

namespace Baorv\CleverReach\Resources\Endpoints;

use Baorv\CleverReach\Exceptions\CleverReachException;
use Baorv\CleverReach\Resources\Resource;

class Blacklist extends Resource
{

    /**
     * Returns a list with all blacklisted email addresses
     *
     * @return array
     * @throws CleverReachException
     */
    public function all(): array
    {
        return $this->httpClient->get('/v3/blacklist.json');
    }

    /**
     * Get infos of a single blacklisted email address. You can use it to check if a email is on the blacklist.
     *
     * @param string $email
     * @return array
     * @throws CleverReachException
     */
    public function get(string $email): array
    {
        return $this->httpClient->get("/v3/blacklist.json/{$email}");
    }

    /**
     * Add a new email address to the blacklist
     *
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function create(array $params): array
    {
        return $this->httpClient->post('/v3/blacklist.json', $params);
    }

    /**
     * Filters provided list of emails and returns the not blacklisted ones
     *
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function validate(array $params): array
    {
        return $this->httpClient->post('/v3/blacklist/validate.json', $params);
    }

    /**
     * Updates an entry of the blacklist by email
     *
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function update(array $params): array
    {
        return $this->httpClient->put('/v3/blacklist.json', $params);
    }

    /**
     * Delete an email address from blacklist
     *
     * @param string $email
     * @return array
     * @throws CleverReachException
     */
    public function delete(string $email): array
    {
        return $this->httpClient->delete("/v3/blacklist.json/{$email}");
    }
}