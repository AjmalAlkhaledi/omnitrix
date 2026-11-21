<?php

declare(strict_types=1);

use Omnitrix\Config\Env;

// Mail::to(...)->send(new WelcomeMail(...)). 'log' writes messages to the log (development).
return [
    'default' => Env::get('MAIL_MAILER', 'log') ?? 'log',
    'from' => [
        'address' => Env::get('MAIL_FROM_ADDRESS', 'hello@example.com') ?? 'hello@example.com',
        'name' => Env::get('MAIL_FROM_NAME', 'Omnitrix') ?? 'Omnitrix',
    ],
    'mailers' => [
        'smtp' => [
            'host' => Env::get('MAIL_HOST', '127.0.0.1') ?? '127.0.0.1',
            'port' => Env::int('MAIL_PORT', 587),
            'encryption' => Env::get('MAIL_ENCRYPTION', 'tls') ?? 'tls', // tls (STARTTLS), ssl or none
            'username' => Env::get('MAIL_USERNAME'),
            'password' => Env::get('MAIL_PASSWORD'),
        ],
        'log' => [],
        'array' => [],
    ],
];
