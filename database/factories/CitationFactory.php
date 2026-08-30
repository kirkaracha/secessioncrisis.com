<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\AllowedCitationStylesEnum;
use App\Enums\AllowedCitationTypesEnum;
use App\Models\Citation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Citation>
 */
final class CitationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(AllowedCitationTypesEnum::cases()),
            'title' => $this->faker->sentence(),
            'citation_key' => $this->faker->optional()->word(),
            'notes' => $this->faker->optional()->paragraph(),
            'accessed_at' => $this->faker->optional()->date(),
            'citation_style' => $this->faker->optional()->randomElement(AllowedCitationStylesEnum::cases()),
        ];
    }
}
