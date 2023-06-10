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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

<<<<<<< HEAD
     'google' => [
        'client_id'     => '529852079232-ndidcfqs5gp2ogtucsquh417s0h78ogo.apps.googleusercontent.com',
        'client_secret' => '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',
=======
    'google' => [
        'client_id'     => '464962316043-gm4a998dkvqusig0028bjdhaccc41o7k.apps.googleusercontent.com',
        'client_secret' => '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',
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
        'redirect'      => 'https://devpt.way2track.com/public/callback/'
    ],
];
