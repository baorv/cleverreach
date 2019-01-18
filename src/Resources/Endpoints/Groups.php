<?php

namespace Baorv\CleverReach\Resources\Endpoints;

use Baorv\CleverReach\Exceptions\CleverReachException;
use Baorv\CleverReach\Resources\Resource;

class Groups extends Resource
{

    /**
     * Returns array of groups (receiver lists)
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/groups-v3/list_get
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function groups(array $params = []): array
    {
        return $this->httpClient->get('/v3/groups.json', $params);
    }

    /**
     * Return extended stats about the group (receiver list)
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/groups-v3/advstats_get
     * @param string $groupID
     * @return array
     * @throws CleverReachException
     */
    public function advancedStats(string $groupID): array
    {
        return $this->httpClient->get("/v3/groups.json/{$groupID}/advancedstats");
    }

    /**
     * Return local attributes.
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/groups-v3/list_grp_get
     * @param string $groupID
     * @return array
     * @throws CleverReachException
     */
    public function attributes(string $groupID): array
    {
        return $this->httpClient->get("/v3/groups.json/{$groupID}/attributes");
    }

    /**
     * Returns a list with all blacklisted email addresse for a group
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/groups-v3/groupBlacklist_get
     * @param string $groupID
     * @return array
     * @throws CleverReachException
     */
    public function blacklist(string $groupID): array
    {
        return $this->httpClient->get("/v3/groups.json/{$groupID}/blacklist");
    }

    /**
     * Return filter
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/groups-v3/list__get
     * @param string $groupID
     * @return array
     * @throws CleverReachException
     */
    public function filters(string $groupID): array
    {
        return $this->httpClient->get("/v3/groups.json/{$groupID}/filters");
    }

    /**
     * Get filter
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/groups-v3/retrieve__get
     * @param string $groupID
     * @param string $filterID
     * @return array
     * @throws CleverReachException
     */
    public function getFilter(string $groupID, string $filterID): array
    {
        return $this->httpClient->get("/v3/groups.json/{$groupID}/filters/{$filterID}");
    }

    /**
     * Return a list of receivers
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/groups-v3/list_filter_get
     * @param string $groupID
     * @param string $filterID
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function getFilterReceivers(string $groupID, string $filterID, array $params = []): array
    {
        return $this->httpClient->get("/v3/groups.json/{$groupID}/filters/{$filterID}/receivers", $params);
    }

    /**
     * Return groups statistics based on a Filter
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/groups-v3/filterStats_get
     * @param string $groupID
     * @param string $filterID
     * @return array
     * @throws CleverReachException
     */
    public function getFilterStats(string $groupID, string $filterID): array
    {
        return $this->httpClient->get("/v3/groups.json/{$groupID}/filters/{$filterID}/stats");
    }

    /**
     * Return a list of receivers
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/groups-v3/filterStats_get
     * @param string $groupID
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function receivers(string $groupID, array $params = []): array
    {
        return $this->httpClient->get("/v3/groups.json/{$groupID}/receivers", $params);
    }

    /**
     * Return specific receiver of a certain group
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/groups-v3/retrieve_groups_get
     * @param string $groupID
     * @param string $poolID
     * @return array
     * @throws CleverReachException
     */
    public function getReceiver(string $groupID, string $poolID): array
    {
        return $this->httpClient->get("/v3/groups.json/{$groupID}/receivers/{$poolID}");
    }

    /**
     * Return a list of events for a receiver
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/groups-v3/list_groups__get
     * @param string $groupID
     * @param string $poolID
     * @return array
     * @throws CleverReachException
     */
    public function getReceiverEvents(string $groupID, string $poolID): array
    {
        return $this->httpClient->get("/v3/groups.json/{$groupID}/receivers/{$poolID}/events");
    }

    /**
     * Return a list of orders
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/groups-v3/list_groups___get
     * @param string $groupID
     * @param string $poolID
     * @return array
     * @throws CleverReachException
     */
    public function getReceiverOrders(string $groupID, string $poolID): array
    {
        return $this->httpClient->get("/v3/groups.json/{$groupID}/receivers/{$poolID}/orders");
    }

    /**
     * Return group by given id
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/groups-v3/retrieve_get
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function get(string $id): array
    {
        return $this->httpClient->get("/v3/groups.json/{$id}");
    }

    /**
     * Return group forms
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/groups-v3/forms_get
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function forms(string $id): array
    {
        return $this->httpClient->get("/v3/groups.json/{$id}/forms");
    }

    /**
     * Return stats about the group (receiver list)
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/groups-v3/stats_get
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function stats(string $id): array
    {
        return $this->httpClient->get("/v3/groups.json/{$id}/stats");
    }

    /**
     * Create a list of receivers
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/groups-v3/create_post
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function create(array $params): array
    {
        return $this->httpClient->post('/v3/groups.json', $params);
    }

    /**
     * Create attribute
     *
     * @param string $groupID
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function createAttribute(string $groupID, array $params): array
    {
        return $this->httpClient->post("/v3/groups.json/{$groupID}/attributes", $params);
    }

    /**
     * Delete attribute
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/groups-v3/remove_grps_delete
     * @param string $groupID
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function deleteAttribute(string $groupID, string $id): array
    {
        return $this->httpClient->delete("/v3/groups.json/{$groupID}/attributes/{$id}");
    }

    /**
     * Deletes a filter/segment
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/groups-v3/removeFilter_delete
     * @param string $groupID
     * @param string $filterID
     * @return array
     * @throws CleverReachException
     */
    public function deleteFilter(string $groupID, string $filterID): array
    {
        return $this->httpClient->delete("/v3/groups.json/{$groupID}/filters/{$filterID}");
    }

    /**
     * Delete a receiver by id
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/groups-v3/remove__delete
     * @param string $groupID
     * @param string $poolID
     * @return array
     * @throws CleverReachException
     */
    public function deleteReceiver(string $groupID, string $poolID): array
    {
        return $this->httpClient->delete("/v3/groups.json/{$groupID}/receivers/{$poolID}");
    }

    /**
     * Delete order item
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/groups-v3/remove_groups_delete
     * @param string $groupID
     * @param string $poolID
     * @param string $orderID
     * @return array
     * @throws CleverReachException
     */
    public function deleteOrder(string $groupID, string $poolID, string $orderID): array
    {
        return $this->httpClient->delete("/v3/groups.json/{$groupID}/receivers/{$poolID}/orders/{$orderID}");
    }

    /**
     * Delete group (receiver list)
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/groups-v3/remove_delete
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function delete(string $id): array
    {
        return $this->httpClient->delete("/v3/groups.json/{$id}");
    }

    /**
     * Removes email address from group blacklist
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/groups-v3/groupBlacklistRemove_delete
     * @param string $id
     * @param string $email
     * @return array
     * @throws CleverReachException
     */
    public function deleteBlacklist(string $id, string $email): array
    {
        return $this->httpClient->delete("/v3/groups.json/{$id}/blacklist/{$email}");
    }

    /**
     * Delete all email addresses from group (receiver list)
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/groups-v3/clear_delete
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function clear(string $id): array
    {
        return $this->httpClient->delete("/v3/groups.json/{$id}/clear");
    }
}