<?php

declare(strict_types=1);

return [
    'prefix' => 'cache:',

    // Default lifetime in seconds for Cache::set() and Cache::remember() without a TTL.
    'ttl' => 3600,
];
