<?php

namespace Baorv\CleverReach\Resources\Endpoints;

use Baorv\CleverReach\Exceptions\CleverReachException;
use Baorv\CleverReach\Resources\Resource;

class Clients extends Resource
{

    /**
     * Returns a list of clients managed by this account. In case of a single client it returns a object
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/clients-v3/list_get
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function all(array $params = []): array
    {
        return $this->httpClient->get('/v3/clients.json', $params);
    }

    /**
     * Get info for single client
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/clients-v3/retrieve_get
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function get(string $id): array
    {
        return $this->httpClient->get("/v3/clients.json/{$id}");
    }

    /**
     * Get only the amount of active receivers of a certain client
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/clients-v3/activereceivercount_get
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function getActiveReceiverCount(string $id): array
    {
        return $this->httpClient->get("/v3/clients.json/{$id}/activereceivercount");
    }

    /**
     * Get the currently still available contignent of mails, free to send
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/clients-v3/retrieveContingent_get
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function contingent(string $id): array
    {
        return $this->httpClient->get("/v3/clients.json/{$id}/contingent");
    }

    /**
     * Get the current active invoice address for one client
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/clients-v3/invoiceaddress_get
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function invoiceAddress(string $id): array
    {
        return $this->httpClient->get("/v3/clients.json/{$id}/invoiceaddress");
    }

    /**
     * Get the next invoice date as a timestamp
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/clients-v3/nextInvoiceDate_get
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function nextInvoiceDate(string $id): array
    {
        return $this->httpClient->get("/v3/clients.json/{$id}/nextinvoicedate");
    }

    /**
     * Get subscription/plan info for one client
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/clients-v3/plan_get
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function plan(string $id): array
    {
        return $this->httpClient->get("/v3/clients.json/{$id}/plan");
    }

    /**
     * Get the amount of receivers of a certain client
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/clients-v3/receivercount_get
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function receiverCount(string $id): array
    {
        return $this->httpClient->get("/v3/clients.json/{$id}/receivercount");
    }

    /**
     * Get info for single client
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/clients-v3/retrieveJWT_get
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function token(string $id): array
    {
        return $this->httpClient->get("/v3/clients.json/{$id}/token");
    }

    /**
     * Get userlist for single client
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/clients-v3/userlist_get
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function users(string $id): array
    {
        return $this->httpClient->get("/v3/clients.json/{$id}/users");
    }

    /**
     * Get the payment method configured for one client
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/clients-v3/paymentmethods_get
     * @return array
     * @throws CleverReachException
     */
    public function paymentAccount(): array
    {
        return $this->httpClient->get('/v3/clients/paymentmethods.json');
    }

    /**
     * Creates a new account with client and a user with the calling account as a whitelabel
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/clients-v3/createWhitelabelClient_post
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function createAccount(array $params): array
    {
        return $this->httpClient->post('/v3/clients/createAccount.json', $params);
    }

    /**
     * Finish the oauth process by calling this with proper information
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/clients-v3/oauthFinish_post
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function finish(array $params): array
    {
        return $this->httpClient->post('/v3/clients/finish.json', $params);
    }
}