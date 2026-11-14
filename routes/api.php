<?php

declare(strict_types=1);

/*
 * API routes. `$router` is in scope; handlers may be closures, [Controller::class, 'method']
 * pairs or invokable classes. `php omnitrix routes` lists everything that is registered.
 */

use App\Controllers\UserController;
use Omnitrix\Routing\Router;

/** @var Router $router */
$router->get('/', static fn(): array => ['name' => 'Omnitrix', 'status' => 'ok']);

$router->group('/api', static function (Router $router): void {
    $router->get('/users', [UserController::class, 'index'])->name('users.index');
    $router->post('/users', [UserController::class, 'store'])->name('users.store');
    $router->get('/users/{id:\d+}', [UserController::class, 'show'])->name('users.show');
    $router->put('/users/{id:\d+}', [UserController::class, 'update'])->name('users.update');
    $router->delete('/users/{id:\d+}', [UserController::class, 'destroy'])->name('users.destroy');
});
