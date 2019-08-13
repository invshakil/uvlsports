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
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
	
	/*
	 * Facebook Connection
	 */
	
	'facebook' => [
		'client_id' => '287256215072572',
		'client_secret' => '2cecaf486d82e83ce3eb83a2610819c1',
		'redirect' => 'http://localhost:8000/login/facebook/callback',
	],
	
	
	'google' => [
		'client_id' => env('15688333143-ino7tneq8p66cshto4kc8r46s0jem4m3.apps.googleusercontent.com'),
		'client_secret' => env('95G-JVT1FOuuVlW1o5NbpGzB'),
		'redirect' => 'http://localhost:8000/login/google/callback',
	],
	
	
	'twitter' => [
		'client_id' => env('TWITTER_CLIENT_ID'),
		'client_secret' => env('TWITTER_CLIENT_SECRET'),
		'redirect' => 'http://localhost:8000/login/twitter/callback',
	],

];
