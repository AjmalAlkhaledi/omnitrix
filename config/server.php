<?php

declare(strict_types=1);

use Omnitrix\Config\Env;

// `php omnitrix serve --host --port --workers` overrides SERVER_HOST, SERVER_PORT and SERVER_WORKERS.
return [
    'host' => Env::get('SERVER_HOST', '127.0.0.1') ?? '127.0.0.1',
    'port' => Env::int('SERVER_PORT', 8080),
    'workers' => Env::int('SERVER_WORKERS', 4),

    // Recycle a worker after this many requests (0 = never).
    'max_request' => Env::int('SERVER_MAX_REQUEST', 0),

    // Seconds a draining worker may take to finish in-flight requests on shutdown or reload.
    'max_wait_time' => 10,

    // OpenSwoole's own log.
    'log_file' => __DIR__ . '/../storage/logs/server.log',
    'log_level' => 'warning',
];
