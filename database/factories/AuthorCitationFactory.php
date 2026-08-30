<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Author;
use App\Models\AuthorCitation;
use App\Models\Citation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AuthorCitation>
 */
final class AuthorCitationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'author_id' => Author::factory(),
            'author_order' => $this->faker->numberBetween(int1: 1, int2: 10),
            'citation_id' => Citation::factory(),
        ];
    }
}
