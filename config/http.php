<?php

declare(strict_types=1);

return [
    // Larger request bodies are answered with 413 before a handler runs.
    'max_body_size' => 1024 * 1024,

    // Seconds before a request still running is answered with 503.
    'request_timeout' => 30,
];
