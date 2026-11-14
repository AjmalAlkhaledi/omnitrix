<?php

declare(strict_types=1);

use App\Jobs\SendWelcomeEmail;
use Omnitrix\Config\Env;

// Background jobs: dispatch with Queue::dispatch('name', $payload), process with `php omnitrix queue:work`.
return [
    'queue' => Env::get('QUEUE_NAME', 'default') ?? 'default',
    'concurrency' => Env::int('QUEUE_CONCURRENCY', 4),
    'timeout' => 60,

    // Job name => class with a handle(array $payload, Job $job): void method.
    'jobs' => [
        'users.welcome' => SendWelcomeEmail::class,
    ],
];
