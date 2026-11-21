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
    // Password reset links: {token} and {email} are filled in (point it at your frontend).
    'passwords' => [
        'url' => (Omnitrix\Config\Env::get('APP_URL', 'http://127.0.0.1:8080') ?? '') . '/reset-password?token={token}&email={email}',
        'expire' => 60,   // minutes
        'throttle' => 60, // seconds between links for one address
    ],
    // Model policies: App\Models\Post::class => App\Policies\PostPolicy::class
    'policies' => [],
];
