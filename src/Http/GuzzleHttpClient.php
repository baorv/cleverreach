<?php

namespace Baorv\CleverReach\Http;

use Baorv\CleverReach\Contracts\HttpClientContract;
use Baorv\CleverReach\Exceptions\CleverReachException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;

class GuzzleHttpClient extends Client implements HttpClientContract
{

    const BASE_URL = 'https://rest.cleverreach.com';
    const METHOD_POST = 'POST';
    const METHOD_GET = 'GET';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';

    /** @var string $accessToken */
    protected $accessToken;

    /** @var string $clientID */
    protected $clientID;

    /** @var string $clientSecret */
    protected $clientSecret;

    /**
     * GuzzleHttp constructor.
     * @param null $clientID
     * @param null $clientSecret
     * @param null $accessToken
     */
    public function __construct($clientID = null, $clientSecret = null, $accessToken = null)
    {
        parent::__construct([
            'base_uri' => self::BASE_URL,
        ]);
        if (!is_null($clientID)) {
            $this->clientID = $clientID;
        }
        if (!is_null($clientSecret)) {
            $this->clientSecret = $clientSecret;
        }
        if (!is_null($accessToken)) {
            $this->accessToken = $accessToken;
        }
    }

    /**
     * Creates a new access token
     *
     * @throws CleverReachException
     */
    public function authorize()
    {
        try {
            $response = $this->request(
                self::METHOD_POST,
                '/oauth/token.php', [
                    'auth' => [
                        $this->getClientID(),
                        $this->getClientSecret(),
                    ],
                    'json' => [
                        'grant_type' => 'client_credentials',
                    ],
                ]
            );
            $data = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
            if (!isset($data['access_token'])) {
                throw new CleverReachException('Can\' retrieve access token CleverReach API', 401);
            }
            $this->accessToken = $data['access_token'];
        } catch (GuzzleException $e) {
            throw new CleverReachException($e->getCode(), $e->getCode(), $e);
        }
    }

    /**
     * Get client ID from the client
     *
     * @return string
     */
    public function getClientID(): string
    {
        return $this->clientID;
    }

    /**
     * Inject client ID to the client
     *
     * @param string $clientID
     * @return HttpClientContract
     */
    public function setClientID(string $clientID): HttpClientContract
    {
        $this->clientID = $clientID;
        return $this;
    }

    /**
     * Get client secret from the client
     *
     * @return string
     */
    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }

    /**
     * Inject client secret to client
     *
     * @param string $clientSecret
     * @return HttpClientContract
     */
    public function setClientSecret(string $clientSecret): HttpClientContract
    {
        $this->clientSecret = $clientSecret;
        return $this;
    }

    /**
     * Request to server with POST method
     *
     * @param string $path
     * @param array $data
     * @return array
     * @throws CleverReachException
     */
    public function post(string $path, array $data = []): array
    {
        return $this->doRequest(self::METHOD_POST, $path, $data);
    }

    /**
     * @param string $method
     * @param string $path
     * @param array $data
     * @return array
     * @throws CleverReachException
     */
    protected function doRequest(string $method, string $path, array $data = []): array
    {

        $options = [
            'headers' => [
                'Authorization' => "Bearer {$this->getAccessToken()}"
            ],
        ];
        $options = array_merge(
            $options,
            $method === self::METHOD_GET ? ['query' => $data] : ['json' => $data]
        );
        try {
            $response = $this->request($method, $path, $options);
            $contents = $response->getBody()->getContents();
            if ($contents === 'true' || $contents === 'false') {
                return [
                    'isOK' => $contents === 'true'
                ];
            }
            $responseData = \GuzzleHttp\json_decode($contents, true);
            return $responseData;
        } catch (GuzzleException $e) {
            throw new CleverReachException($e->getMessage(), $e->getCode(), $e);
        } catch (InvalidArgumentException $e) {
            throw new CleverReachException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * Returns access token
     *
     * @return mixed
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * Set access token to Http client
     *
     * @param string $accessToken
     * @return HttpClientContract
     */
    public function setAccessToken(string $accessToken): HttpClientContract
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    /**
     * Request to server with GET method
     *
     * @param string $path
     * @param array $data
     * @return array
     * @throws CleverReachException
     */
    public function get(string $path, array $data = []): array
    {
        return $this->doRequest(self::METHOD_GET, $path, $data);
    }

    /**
     * Request to server with PUT method
     *
     * @param string $path
     * @param array $data
     * @return array
     * @throws CleverReachException
     */
    public function put(string $path, array $data = []): array
    {
        return $this->doRequest(self::METHOD_PUT, $path, $data);
    }

    /**
     * Request to server with DELETE method
     *
     * @param string $path
     * @param array $data
     * @return array
     * @throws CleverReachException
     */
    public function delete(string $path, array $data = []): array
    {
        return $this->doRequest(self::METHOD_DELETE, $path, $data);
    }
}