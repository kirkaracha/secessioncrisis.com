<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Resend, Postmark, AWS, and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env(key: 'POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env(key: 'RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env(key: 'AWS_ACCESS_KEY_ID'),
        'secret' => env(key: 'AWS_SECRET_ACCESS_KEY'),
        'region' => env(key: 'AWS_DEFAULT_REGION', default: 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env(key: 'SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env(key: 'SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],
];
