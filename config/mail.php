<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
    | This option controls the default mailer that is used to send any email
    | messages sent by your application. Alternative mailers may be setup
    | and used as needed; however, this mailer will be used by default.
    |
    */

    // When failover mailer is used, email sending service can quickly
    //  failover to another provider without affecting your customers if 
    //  one of the services goes down.

    'default' => env('MAIL_MAILER', 'failover'),  //Test case written to test the functionality

    /*
    |--------------------------------------------------------------------------
    | Mailer Configurations
    |--------------------------------------------------------------------------
    |
    | Here you may configure all of the mailers used by your application plus
    | their respective settings. Several examples have been configured for
    | you and you are free to add your own as your application requires.
    |
    | Laravel supports a variety of mail "transport" drivers to be used while
    | sending an e-mail. You will specify which one you are using for your
    | mailers below. You are free to add additional mailers as required.
    |
    | Supported: "smtp", "sendmail", "mailgun", "ses",
    |            "postmark", "log", "array"
    |
    */

    'mailers' => [

        'smtp' => [
            'transport' => 'smtp',
            'host' => env('MAIL_HOST'),
            'port' => env('MAIL_PORT', 587),
            'encryption' => env('MAIL_ENCRYPTION'),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => 5,
            'auth_mode' => null,
        ],


        'mailgun' => [
            'transport' => 'mailgun',
            'host' => env('MAILGUN_HOST'),
            'port' => env('MAIL_PORT', 587),
            'encryption' => env('MAIL_ENCRYPTION'),
            'username' => env('MAILGUN_USERNAME'),
            'password' => env('MAILGUN_PASSWORD'),
            'timeout' => 5,
            'auth_mode' => null,
        ],

        'mailtrap' => [
            'transport' => 'smtp',
            'host' => env('MAILTRAP_HOST'),
            'port' => env('MAILTRAP_PORT', 587),
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'username' => env('MAILTRAP_USERNAME'),
            'password' => env('MAILTRAP_PASSWORD'),
            'timeout' => 5,
            'auth_mode' => null,
        ],

        'postmark' => [
            'transport' => 'smtp',
            'host' => env('MAIL_POSTMARK_HOST'),
            'port' => env('MAIL_PORT', 587),
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'username' => env('MAIL_POSTMARK_USERNAME'),
            'password' => env('MAIL_POSTMARK_PASSWORD'),
            'timeout' => 5,
            'auth_mode' => null,
        ],

                     
        'ses' => [
            'transport' => 'ses',
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => '/usr/sbin/sendmail -bs',
        ],

        'log' => [
            'transport' => 'log',
            'channel' => 'mail',
        ],

        'array' => [
            'transport' => 'array',
        ],

        //mailer switching sequence for failover setup        
        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',
                'mailgun', 
                'mailtrap',
                'postmark',                               
                'log',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
    | You may wish for all e-mails sent by your application to be sent from
    | the same address. Here, you may specify a name and address that is
    | used globally for all e-mails that are sent by your application.
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Markdown Mail Settings
    |--------------------------------------------------------------------------
    |
    | If you are using Markdown based email rendering, you may configure your
    | theme and component paths here, allowing you to customize the design
    | of the emails. Or, you may simply stick with the Laravel defaults!
    |
    */

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

];
