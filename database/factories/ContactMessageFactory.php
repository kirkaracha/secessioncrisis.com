<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\ContactFormEmail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ContactFormEmail>
 */
final class ContactMessageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'subject' => $this->faker->sentence(),
            'message' => $this->faker->paragraph(),
        ];
    }
}
