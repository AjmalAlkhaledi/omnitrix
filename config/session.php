<?php

declare(strict_types=1);

use Omnitrix\Config\Env;

// Sessions for browser clients (StartSession middleware). Token-based APIs do not need them.
return [
    // redis (default when config/redis.php exists), cookie (encrypted with APP_KEY, ~4 KB) or array (tests)
    // 'driver' => 'redis',
    'lifetime' => 120,                       // minutes of inactivity
    'cookie' => 'omnitrix_session',
    'secure' => Env::bool('SESSION_SECURE_COOKIE', false), // true behind HTTPS
    'same_site' => 'Lax',
];
