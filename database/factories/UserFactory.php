<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use DateTimeImmutable;
use Omnitrix\Database\Factories\Factory;

/** User::factory()->count(10)->create() — in seeders and tests. */
final class UserFactory extends Factory
{
    protected string $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->email(),
            'password' => 'password',              // hashed by the model's 'hashed' cast
            'email_verified_at' => new DateTimeImmutable(),
        ];
    }

    public function unverified(): static
    {
        return $this->state(['email_verified_at' => null]);
    }
}
