<?php

declare(strict_types=1);

namespace Database\Seeds;

use App\Models\User;
use Omnitrix\Database\Seeding\Seeder;

/** `php omnitrix db:seed` (or `migrate --seed`) runs this seeder. */
final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create(['name' => 'Demo User', 'email' => 'demo@example.com']);
        $user->posts()->create(['title' => 'Hello, Omnitrix', 'body' => 'Your first post.', 'published' => true]);
    }
}
