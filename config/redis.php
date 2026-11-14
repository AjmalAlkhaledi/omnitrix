<?php

declare(strict_types=1);

use Omnitrix\Config\Env;

// Used by the Redis and Cache facades, the queue and the Redis rate limiter.
return [
    'host' => Env::get('REDIS_HOST', '127.0.0.1') ?? '127.0.0.1',
    'port' => Env::int('REDIS_PORT', 6379),
    'password' => Env::get('REDIS_PASSWORD'),   // empty or unset: no AUTH
    'database' => Env::int('REDIS_DATABASE', 0),
    'prefix' => Env::get('REDIS_PREFIX', 'omnitrix:') ?? 'omnitrix:',
    'pool' => ['max' => 16],
];
