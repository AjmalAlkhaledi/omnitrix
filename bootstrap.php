<?php

declare(strict_types=1);

/*
 * Builds the application: environment, configuration, global middleware and routes.
 * Used by `php omnitrix serve` and every other console command.
 */

use Omnitrix\Application;
use Omnitrix\Config\Config;
use Omnitrix\Config\Env;
use Omnitrix\Security\SecurityHeaders;

require_once __DIR__ . '/vendor/autoload.php';

Env::load(__DIR__ . '/.env');

$app = Application::create(Config::load(__DIR__ . '/config'));

$app->middleware(new SecurityHeaders());

$app->health('/health');

$app->routes(__DIR__ . '/routes/api.php');

// Scheduled tasks: run `php omnitrix schedule:work`, or `schedule:run` every minute from cron.
// $app->schedule(static function (Omnitrix\Scheduling\Schedule $schedule): void {
//     $schedule->job('reports.build')->dailyAt('02:00')->onOneServer();
// });

return $app;
