<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
        'client_id' => '757157928982948',  //client face của bạn
        'client_secret' => '403c1d994c76854580d51b792f41fd19',  //client app service face của bạn
        'redirect' => 'https://pczone.vn/PCZONE/public/login-facebook/callback' //callback trả về
    ],

    'google' => [
        'client_id' => '431021651087-3rk0lfqff9uhrvm5v8f1tnplr89obekr.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://pczone.vn/PCZONE/public/login-google/callback'
    ],

];
