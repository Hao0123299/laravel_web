<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
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

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],
    'facebook' => [
        'client_id' => '378345737058093',  //client face
        'client_secret' => '7aa0562075e486c8409a1419c08a1447',  //client app service face
        'redirect' => 'https://kimlong.com/kimlongshop/facebook/callback' //callback trả về
    ],

    'google' => [
        'client_id' => '235352946187-kd87gaqdvm2b0ut7a6tnq95iiv1odhoo.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://kimlong.com/kimlongshop/google/callback'
    ],



];
