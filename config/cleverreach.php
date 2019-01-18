<?php

return [

    /*
    |--------------------------------------------------------------------------
    | CleverReach client ID
    |--------------------------------------------------------------------------
    |
    | The client ID of a CleverReach account. You can find yours at
    | https://eu2.cleverreach.com/admin/account_rest.php
    |
    */
    'client_id' => env('CLEVERREACH_CLIENT_ID'),

    /*
    |--------------------------------------------------------------------------
    | CleverReach client secret
    |--------------------------------------------------------------------------
    |
    | The client secret of a CleverReach account. You can find yours at
    | https://eu2.cleverreach.com/admin/account_rest.php
    |
    */
    'client_secret' => env('CLEVERREACH_CLIENT_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | CleverReach access token
    |--------------------------------------------------------------------------
    |
    | The access token of a CleverReach account with an app. You can skip it if you authorize in your app.
    |
    */
    'access_token' => env('CLEVERREACH_ACCESS_TOKEN', null)
];