<?php

declare(strict_types=1);

// Event listeners: event class (or name, wildcards allowed: 'order.*') => listener classes.
// Listeners implementing Omnitrix\Events\ShouldQueue run in `php omnitrix queue:work`.
return [
    'listen' => [
        // App\Events\OrderShipped::class => [App\Listeners\SendShipmentEmail::class],
    ],
];
