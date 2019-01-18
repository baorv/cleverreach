<?php

namespace Baorv\CleverReach\Contracts;

use Baorv\CleverReach\Exceptions\CleverReachException;

interface HttpClientContract
{

    /**
     * Creates a new access token
     *
     * @return mixed
     */
    public function authorize();

    /**
     * Inject client ID to the client
     *
     * @param string $clientID
     * @return HttpClientContract
     */
    public function setClientID(string $clientID): HttpClientContract;

    /**
     * Get client ID from the client
     *
     * @return string
     */
    public function getClientID(): string;

    /**
     * Get client secret from the client
     *
     * @return string
     */
    public function getClientSecret(): string;

    /**
     * Inject client secret to client
     *
     * @param string $clientSecret
     * @return HttpClientContract
     */
    public function setClientSecret(string $clientSecret): HttpClientContract;

    /**
     * Returns access token
     *
     * @return mixed
     */
    public function getAccessToken(): string;

    /**
     * Set access token to Http client
     *
     * @param string $accessToken
     * @return HttpClientContract
     */
    public function setAccessToken(string $accessToken): HttpClientContract;

    /**
     * Request to server with POST method
     *
     * @param string $path
     * @param array $data
     * @return array
     * @throws CleverReachException
     */
    public function post(string $path, array $data = []): array;

    /**
     * Request to server with GET method
     *
     * @param string $path
     * @param array $data
     * @return array
     * @throws CleverReachException
     */
    public function get(string $path, array $data = []): array;

    /**
     * Request to server with PUT method
     *
     * @param string $path
     * @param array $data
     * @return array
     * @throws CleverReachException
     */
    public function put(string $path, array $data = []): array;

    /**
     * Request to server with DELETE method
     *
     * @param string $path
     * @param array $data
     * @return array
     * @throws CleverReachException
     */
    public function delete(string $path, array $data = []): array;
}