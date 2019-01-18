<?php

namespace Baorv\CleverReach\Tests\Unit\Resources;

use Baorv\CleverReach\Exceptions\CleverReachException;
use Baorv\CleverReach\Resources\Endpoints\Debug;
use Baorv\CleverReach\Tests\TestCase;

class DebugTest extends TestCase
{

    /** @var Debug $_debugResource */
    private $_debugResource;

    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct();
        $this->_debugResource = new Debug($this->httpClient);
    }

    /**
     * @group debug
     * @group endpoints
     * @throws CleverReachException
     */
    public function testDebugCanExchange()
    {
        $response = $this->_debugResource->exchange();
        $this->assertArrayHasKey('access_token', $response);
        $this->assertArrayHasKey('token_type', $response);
        $this->assertArrayHasKey('scope', $response);
        $this->assertArrayHasKey('refresh_token', $response);
    }

    /**
     * @group debug
     * @group endpoints
     * @throws CleverReachException
     */
    public function testDebugCanTTL()
    {
        $response = $this->_debugResource->ttl();
        $this->assertArrayHasKey('ttl', $response);
        $this->assertArrayHasKey('date', $response);
    }

    /**
     * @group debug
     * @group endpoints
     * @throws CleverReachException
     */
    public function testDebugCanWhoami()
    {
        $response = $this->_debugResource->whoami();
        $this->assertArrayHasKey('id', $response);
        $this->assertArrayHasKey('name', $response);
        $this->assertArrayHasKey('firstname', $response);
        $this->assertArrayHasKey('salutation', $response);
        $this->assertArrayHasKey('street', $response);
        $this->assertArrayHasKey('company', $response);
        $this->assertArrayHasKey('zip', $response);
        $this->assertArrayHasKey('city', $response);
        $this->assertArrayHasKey('phone', $response);
        $this->assertArrayHasKey('fax', $response);
        $this->assertArrayHasKey('email', $response);
        $this->assertArrayHasKey('country', $response);
        $this->assertArrayHasKey('login_domain', $response);
    }
}