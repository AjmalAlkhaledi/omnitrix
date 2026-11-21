<?php

declare(strict_types=1);

// Backend for named rate limiters and the RateLimiter facade: 'memory' counts per server in
// shared memory, 'redis' across servers. Default: redis when config/redis.php is present.
return [
    // 'driver' => 'redis',
    'max_keys' => 16384, // memory driver: keys tracked at once
];
