<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Citation;
use App\Models\WebsiteDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<WebsiteDetail>
 */
final class WebsiteDetailFactory extends Factory
{
    public function definition(): array
    {
        return [
            'citation_id' => Citation::factory(),
            'url' => $this->faker->url(),
            'archive_url' => $this->faker->optional()->url(),
            'site_name' => $this->faker->optional()->company(),
            'published_date' => $this->faker->optional()->date(),
            'last_accessed_at' => $this->faker->optional()->date(),
        ];
    }
}
