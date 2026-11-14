<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Models\User;
use Omnitrix\Core\Queue\Job;

use function is_int;

/**
 * Dispatched by UserController::store(). Jobs can be delivered more than once, so the handler
 * must be idempotent.
 */
final class SendWelcomeEmail
{
    /** @param array<string, mixed> $payload */
    public function handle(array $payload, Job $job): void
    {
        $id = $payload['user_id'] ?? null;
        $user = is_int($id) ? User::find($id) : null;
        if ($user === null) {
            return; // deleted in the meantime
        }
        // Send the e-mail here, e.g. with Http::post() to your mail provider's API.
    }
}
