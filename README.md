# cleverreach

> Easy CleverReach v3 integration for PHP

[![Build Status](https://travis-ci.org/baorv/cleverreach.svg?branch=master)](https://github.com/baorv/cleverreach)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)

- [Requirements](#requirements)
- [Installation](#installation)
- [Origin docs](#origin-docs)
- [Usage](#usage)
  - [Laravel](#laravel)
  - [PHP](#php)
- [Testing](#testing)
- [Issue](#issue)
- [License](#license)
- [Todo](#todo)


## Requirements

| # 	| Dependency 	| Type     	| Version 	| Note                    	|
|:-:	|------------	|----------	|:-------:	|-------------------------	|
| 1 	| PHP        	| Platform 	|  >= 7.0 	|                         	|
| 2 	| Laravel    	| Library  	|  >= 5.5 	| Only when using Laravel 	|

## Installation

### Packagist

* You can install this package via composer

```bash
composer require "baorv/cleverreach":"^0.0.1"
```

* Or `composer.json` way

```json
{
  "require": {
    "baorv/cleverreach": "^0.0.1"
  }
}
```

and run

```bash
composer update "baorv/cleverreach"
```

### For Laravel 

* Add [ServiceProvider](src/ServiceProvider.php) to `config/app.php`

```php
Baorv\Cleverreach\ServiceProvider::class
```

* Change environment variables in `.env`

```dotenv
CLEVERREACH_CLIENT_ID=
CLEVERREACH_CLIENT_SECRET=
CLEVERREACH_ACCESS_TOKEN=
```

* If you want to customize [configuration](config/cleverreach.php). You also can publish the config

```php
php artisan vendor:publish --provider="Baorv\\CleverReach\ServiceProvider"
```

## Origin docs

The origin document from CleverReach located in [https://rest.cleverreach.com/explorer/v3/](https://rest.cleverreach.com/explorer/v3/)

## Usage

### PHP

* To authenticate CleverReach

```php
<?php

use Baorv\CleverReach\Http\GuzzleHttpClient;

$cleverReachApi = new GuzzleHttpClient('client_id', 'client_secret');
$cleverReachApi->authorize();

// Get access token
$accessToken = $cleverReachApi->getAccessToken();
```

* To access a resource from CleverReach server

```php
<?php

use Baorv\CleverReach\Resources\Endpoints\Debug;

/** @var \Baorv\CleverReach\Http\GuzzleHttpClient $cleverReachApi */
$debugApi = new Debug($cleverReachApi);

$debugApi->exchange();
```

### Laravel

* To access an resource from CleverReach api

```php
<?php

use Baorv\CleverReach\Resources\Endpoints\Reports;

app(Reports::class)->all();
```

### Exception

When you request to CleverReach API, it can contain some errors.

* To catch exception, we provide [CleverReachException](src/Exceptions/CleverReachException.php)

```php
<?php

use Baorv\CleverReach\Resources\Endpoints\Reports;
use Baorv\CleverReach\Exceptions\CleverReachException;

try {
    app(Reports::class)->all();
} catch (CleverReachException $ex) {
    // Log or do something with $ex
}
```

* Also, for PHP

```php
<?php

use Baorv\CleverReach\Resources\Endpoints\Reports;
use Baorv\CleverReach\Exceptions\CleverReachException;

/** @var \Baorv\CleverReach\Http\GuzzleHttpClient $cleverReachApi */
$reportApi = new Reports($cleverReachApi);

try {
    $reportApi->all();
} catch (CleverReachException $ex) {
    // Log or do anything with $ex
}
```

## Testing

## Issue

If you have any issue, please [create new issue](https://github.com/baorv/cleverreach/issues/new)

## License

This project is licensed under the [MIT License](LICENSE).

## Todo

- [ ] Add missing resources
- [ ] Make better documents
- [ ] Testing
