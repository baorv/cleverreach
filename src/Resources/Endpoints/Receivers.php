<?php

namespace Baorv\CleverReach\Resources\Endpoints;

use Baorv\CleverReach\Exceptions\CleverReachException;
use Baorv\CleverReach\Resources\Resource;

class Receivers extends Resource
{
    /**
     * Return certain receiver
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/receivers-v3/retrieve_get
     * @param string $id ID or email of the receiver.
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function get(string $id, array $params = []): array
    {
        return $this->httpClient->get("/v3/receivers.json/{$id}", $params);
    }

    /**
     * Get attributes of receiver
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/receivers-v3/retrievePoolAttributes_get
     * @param string $id ID or email of receiver
     * @param array $params
     * @return array Group ID
     * @throws CleverReachException
     */
    public function attributes(string $id, array $params = []): array
    {
        return $this->httpClient->get("/v3/receivers.json/{$id}/attributes", $params);
    }

    /**
     * Retrieves an array of groups the given receiver is allocated to
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/receivers-v3/retrieveGroups_get
     * @param string $id
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function groups(string $id, array $params = []): array
    {
        return $this->httpClient->get("/v3/receivers.json/{$id}/groups", $params);
    }

    /**
     * Return a list of orders
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/receivers-v3/list__get
     * @param string $id ID or email of receiver.
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function orders(string $id, array $params = []): array
    {
        return $this->httpClient->get("/v3/receivers.json/{$id}/orders", $params);
    }

    /**
     * Returns all currently set tags of a certain receiver
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/receivers-v3/retrieveTags_get
     * @param string $id
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function receiverTags(string $id, array $params = []): array
    {
        return $this->httpClient->get("/v3/receivers.json/{$id}/tags", $params);
    }

    /**
     * Return a list of events for a receiver
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/receivers-v3/list_get
     * @param string $poolID
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function events(string $poolID, array $params = []): array
    {
        return $this->httpClient->get("/v3/receivers.json/{$poolID}/events", $params);
    }

    /**
     * Get a list of receivers with a bounce date
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/receivers-v3/retrieveBounces_get
     * @return array
     * @throws CleverReachException
     */
    public function bounced(): array
    {
        return $this->httpClient->get('/v3/receivers/bounced.json');
    }

    /**
     * Returns a list of already set tags
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/receivers-v3/retrieveTagsList_get
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function tags(array $params = []): array
    {
        return $this->httpClient->get('/v3/receivers/tags.json', $params);
    }

    /**
     * Copies a receiver and changes the email within the copy.
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/receivers-v3/cloneReceiver_post
     * @param string $id ID or email of the receiver to be cloned.
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function cloneReceiver(string $id, array $params): array
    {
        return $this->httpClient->post("/v3/receivers.json/{$id}/clone", $params);
    }

    /**
     * Adds given tags to receiver
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/receivers-v3/addTags_post
     * @param string $id ID or email of the receiver.
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function createTags(string $id, array $params): array
    {
        return $this->httpClient->post("/v3/receivers.json/{$id}/tags", $params);
    }

    /**
     * Adds an event to a reveiver
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/receivers-v3/receivers_create_post
     * @param string $poolID ID of the receiver.
     * @param array $param
     * @return array
     * @throws CleverReachException
     */
    public function createEvent(string $poolID, array $param): array
    {
        return $this->httpClient->post("/v3/receivers.json/{$poolID}/events", $param);
    }

    /**
     * Adds orderitem
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/receivers-v3/create_post
     * @param string $poolID ID or email of receiver.
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function createOrder(string $poolID, array $params): array
    {
        return $this->httpClient->post("/v3/receivers.json/{$poolID}/orders", $params);
    }

    /**
     * Delete receivers by given list of ids of emails
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/receivers-v3/removeMultiple_post
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function deletes(array $params): array
    {
        return $this->httpClient->post("/v3/receivers/delete.json", $params);
    }

    /**
     * remove tags by origin from ALL receivers
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/receivers-v3/removeAllTagsByOrigin_delete
     * @param string $origin
     * @return array
     * @throws CleverReachException
     */
    public function deleteTag(string $origin): array
    {
        return $this->httpClient->delete("/v3/receivers/tags.json/{$origin}");
    }

    /**
     * Deletes orderitem
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/receivers-v3/remove__delete
     * @param string $poolID
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function deletePoolOrder(string $poolID, string $id): array
    {
        return $this->httpClient->delete("/v3/receivers.json/{$poolID}/orders/{$id}");
    }

    /**
     * Delete a receiver by id
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/receivers-v3/remove_delete
     * @param string $poolID
     * @return array
     * @throws CleverReachException
     */
    public function deletePool(string $poolID): array
    {
        return $this->httpClient->delete("/v3/receivers.json/{$poolID}");
    }

    /**
     * Removes the given tags from a certain receiver
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/receivers-v3/removeTags_delete
     * @param string $id
     * @param string $tags provide one or more tags comma separated to delete all tags of one origin,
     * just use wildcard: myorigin.*
     * @return array
     * @throws CleverReachException
     */
    public function deleteTags(string $id, string $tags): array
    {
        return $this->httpClient->delete("/v3/receivers.json/{$id}/tags/{$tags}");
    }

    /**
     * Updates order item
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/receivers-v3/update_put
     * @param string $poolID ID or email of receiver.
     * @param string $id ID of the order.
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function updateOrder(string $poolID, string $id, array $params): array
    {
        return $this->httpClient->put("/v3/receivers.json/{$poolID}/orders/{$id}", $params);
    }

    /**
     * Update value of an attribute of a receiver
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/receivers-v3/savePoolAttribute_receivers_put
     * @param string $poolID ID or Email address.
     * @param string $id Attribute ID.
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function updateAttribute(string $poolID, string $id, array $params): array
    {
        return $this->httpClient->put("/v3/receivers.json/{$poolID}/attributes/{$id}", $params);
    }

    /**
     * Changes the email of a certain receiver
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/receivers-v3/changeEmail_put
     * @param string $id ID or email of the receiver to be modified.
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function changeEmail(string $id, array $params): array
    {
        return $this->httpClient->put("/v3/receivers.json/{$id}/email", $params);
    }

    /**
     * Submit a list of emails and return the valid ones
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/receivers-v3/isvalid_post
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function validateEmails(array $params): array
    {
        return $this->httpClient->post('/v3/receivers/isvalid.json', $params);
    }

    /**
     * Returns a list of receivers, filtered by a temporary filter
     *
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/receivers-v3/runtimeFilter_post
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function filter(array $params): array
    {
        return $this->httpClient->post('/v3/receivers/filter.json', $params);
    }
}