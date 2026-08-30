<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\BookDetail;
use App\Models\Citation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BookDetail>
 */
final class BookDetailFactory extends Factory
{
    public function definition(): array
    {
        return [
            'citation_id' => Citation::factory(),
            'isbn' => $this->faker->isbn13(),
            'publisher' => $this->faker->company(),
            'edition' => $this->faker->word(),
            'publication_year' => $this->faker->year(),
            'pages' => $this->faker->numberBetween(int1: 100, int2: 1000),
            'city' => $this->faker->city(),
        ];
    }
}
