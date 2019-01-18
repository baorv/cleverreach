<?php

namespace Baorv\CleverReach\Tests;

use Baorv\CleverReach\Http\GuzzleHttpClient;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class TestCase extends PHPUnitTestCase
{

    /** @var GuzzleHttpClient $httpClient */
    protected $httpClient;

    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct();
        $this->httpClient = new GuzzleHttpClient(
            getenv('API_KEY'),
            getenv('API_SECRET'),
            getenv('ACCESS_TOKEN')
        );
    }
}