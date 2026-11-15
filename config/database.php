<?php

declare(strict_types=1);

use Omnitrix\Config\Env;

return [
    'driver' => Env::get('DB_DRIVER', 'mariadb') ?? 'mariadb',   // mariadb or mysql
    'host' => Env::get('DB_HOST', '127.0.0.1') ?? '127.0.0.1',
    'port' => Env::int('DB_PORT', 3306),
    'database' => Env::get('DB_DATABASE', 'omnitrix') ?? 'omnitrix',
    'username' => Env::get('DB_USERNAME', 'omnitrix') ?? 'omnitrix',
    'password' => Env::get('DB_PASSWORD', '') ?? '',
    'charset' => 'utf8mb4',

    // Seconds a single statement may run (enforced by the server).
    'statement_timeout' => 30.0,

    // Primary-key row cache in Redis (needs config/redis.php). Lookups by key are served from
    // it; writes invalidate exactly the rows they change. List the tables to cache:
    // 'cache' => ['tables' => ['users', 'products'], 'ttl' => 300],
    // Cached queries (->cache(60)) may filter on these columns:
    // 'cache' => ['tables' => ['users'], 'queries' => ['posts' => ['user_id', 'status']]],

    // Connections per worker process: total = workers × max.
    'pool' => [
        'min' => 1,
        'max' => Env::int('DB_POOL_MAX', 10),
        'acquire_timeout' => 5.0,
    ],
];
