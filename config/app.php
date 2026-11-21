<?php

declare(strict_types=1);

use Omnitrix\Config\Env;

return [
    'name' => Env::get('APP_NAME', 'Omnitrix') ?? 'Omnitrix',

    // production, staging, local, testing. Destructive console commands ask for --force in production.
    'env' => Env::get('APP_ENV', 'production') ?? 'production',

    // Exception details in 500 responses. Never enable in production.
    'debug' => Env::bool('APP_DEBUG', false),

    // Public base URL, for absolute links (URL::route(), signed URLs in e-mails).
    'url' => Env::get('APP_URL', 'http://127.0.0.1:8080') ?? 'http://127.0.0.1:8080',

    // 32-byte key for encryption, encrypted cookies, sessions and signed URLs (`php omnitrix key:generate`).
    'key' => Env::get('APP_KEY'),
    // Keys used before the current one: they still decrypt older data after a key rotation.
    'previous_keys' => [],

    // Minimum level written to the log: debug, info, notice, warning, error, critical, alert, emergency.
    'log_level' => Env::get('LOG_LEVEL', 'info') ?? 'info',

    // `php omnitrix down` / `up`. The file driver takes this server down; with several servers use
    // 'redis' so one command covers all of them. `except`: paths still served (fnmatch patterns).
    'maintenance' => [
        'driver' => Env::get('MAINTENANCE_DRIVER', 'file') ?? 'file',
        'path' => __DIR__ . '/../storage/framework/down',
        'except' => ['/health/*', '/metrics'],
    ],
];
