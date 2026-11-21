<?php

declare(strict_types=1);

use Omnitrix\Config\Env;

return [
    'name' => Env::get('APP_NAME', 'Omnitrix') ?? 'Omnitrix',

    // production, staging, local, testing. Destructive console commands ask for --force in production.
    'env' => Env::get('APP_ENV', 'production') ?? 'production',

    // Exception details in 500 responses. Never enable in production.
    'debug' => Env::bool('APP_DEBUG', false),

    // 32-byte key for encryption, encrypted cookies, sessions and signed URLs (`php omnitrix key:generate`).
    'key' => Env::get('APP_KEY'),
    // Keys used before the current one: they still decrypt older data after a key rotation.
    'previous_keys' => [],

    // Minimum level written to the log: debug, info, notice, warning, error, critical, alert, emergency.
    'log_level' => Env::get('LOG_LEVEL', 'info') ?? 'info',
];
