<?php

namespace Baorv\CleverReach\Tests\Unit\Http;

use Baorv\CleverReach\Exceptions\CleverReachException;
use Baorv\CleverReach\Tests\TestCase;

class GuzzleHttpClientTest extends TestCase
{

    /**
     * @group client
     * @throws CleverReachException
     */
    public function testGuzzleCanAuthorize()
    {
        $originClientID = $this->httpClient->getClientID();
        $this->httpClient->setAccessToken(''); // Reset access token
        $this->httpClient->authorize();
        $this->assertGreaterThan(0, strlen($this->httpClient->getAccessToken()));

        $this->expectException(CleverReachException::class);
        $this->httpClient->setClientID('');
        $this->httpClient->authorize();

        $this->expectException(CleverReachException::class);
        $this->httpClient->setClientID($originClientID);
        $this->httpClient->setClientSecret('');
        $this->httpClient->authorize();
    }

    /**
     * @group client
     * @throws CleverReachException
     */
    public function testGuzzleCanPost()
    {
        $response = $this->httpClient->post('/v3/blacklist/validate.json', [
            'emails' => [
                'joker@blacklisted.com',
                'robin@gotham.com',
                'batman@gotham.com'
            ]
        ]);
        $this->assertEquals(3, count($response));
        $response = $this->httpClient->post('/v3/blacklist/validate.json', [
            'emails' => []
        ]);
        $this->assertEquals(0, count($response));
        $this->expectException(CleverReachException::class);
        $this->expectExceptionCode(400);
        $this->httpClient->post('/v3/blacklist/validate.json');
        $this->expectExceptionCode(401);
        $this->httpClient->setAccessToken('wrong_access_token');
        $this->httpClient->post('/v3/blacklist/validate.json', [
            'emails' => []
        ]);
    }

    /**
     * @group client
     * @throws CleverReachException
     */
    public function testGuzzleCanGet()
    {
        $response = $this->httpClient->get('/v3/blacklist.json');
        $this->assertGreaterThanOrEqual(0, count($response));
        $this->expectException(CleverReachException::class);
        $this->expectExceptionCode(401);
        $this->httpClient->setAccessToken('wrong_access_token');
        $this->httpClient->get('/v3/blacklist.json');
    }

    /**
     * @group client
     * @throws CleverReachException
     */
    public function testGuzzleCanPut()
    {
        $email = 'roanvanbao' . str_random(8) . '@gmail.com';
        $response = $this->httpClient->post('/v3/blacklist.json', [
            'email' => $email,
        ]);
        $this->assertIsArray($response);
        $response = $this->httpClient->put('/v3/blacklist.json', [
            'email' => $email,
        ]);
        $this->assertArrayHasKey('email', $response);
        $this->assertArrayHasKey('comment', $response);
        $this->assertArrayHasKey('stamp', $response);
        $this->assertArrayHasKey('isLocked', $response);

        $this->expectException(CleverReachException::class);
        $this->expectExceptionCode(409);
        $this->httpClient->put('/v3/blacklist.json', [
            'email' => $email
        ]);

        $this->expectException(CleverReachException::class);
        $this->expectExceptionCode(400);
        $this->httpClient->put('/v3/blacklist.json', []);

        $this->expectException(CleverReachException::class);
        $this->expectExceptionCode(401);
        $this->httpClient->setAccessToken('wrong_access_token');
        $this->httpClient->put('/v3/blacklist.json', [
            'email' => $email
        ]);
    }
}