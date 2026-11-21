<?php

declare(strict_types=1);

use Omnitrix\Config\Env;

// File storage: Storage::disk('public')->put(...), $request->file('avatar')->store('avatars', 'public').
return [
    'default' => Env::get('FILESYSTEM_DISK', 'local') ?? 'local',

    'disks' => [
        // Private files; share them with Storage::temporaryUrl($path, 300).
        'local' => [
            'driver' => 'local',
            'root' => __DIR__ . '/../storage/app/private',
        ],

        // Served at /storage/... by StorageRoutes (routes/api.php).
        'public' => [
            'driver' => 'local',
            'root' => __DIR__ . '/../storage/app/public',
            'url' => '/storage',
            'visibility' => 'public',
        ],

        // Any S3-compatible service: AWS S3, Cloudflare R2, Backblaze B2, Garage, Ceph, …
        's3' => [
            'driver' => 's3',
            'key' => Env::get('AWS_ACCESS_KEY_ID'),
            'secret' => Env::get('AWS_SECRET_ACCESS_KEY'),
            'region' => Env::get('AWS_DEFAULT_REGION', 'us-east-1'),
            'bucket' => Env::get('AWS_BUCKET'),
            'endpoint' => Env::get('AWS_ENDPOINT'),                  // empty for AWS
            'use_path_style_endpoint' => Env::bool('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'url' => Env::get('AWS_URL'),                            // public base URL (CDN), optional
        ],
    ],
];
