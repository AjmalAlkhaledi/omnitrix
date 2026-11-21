<?php

declare(strict_types=1);

// Guards: 'token' (API, personal access tokens: $user->createToken()) and 'session' (browser
// clients, with the StartSession middleware). Protect routes with Authenticate::using('api').
return [
    'default' => 'api',
    'guards' => [
        'api' => ['driver' => 'token', 'provider' => 'users'],
        'web' => ['driver' => 'session', 'provider' => 'users', 'remember_days' => 30],
    ],
    'providers' => [
        'users' => ['model' => App\Models\User::class],
    ],
];
