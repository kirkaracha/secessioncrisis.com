<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Page;
use App\Traits\StringFormattingTrait;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Page>
 */
final class PageFactory extends Factory
{
    use StringFormattingTrait;

    public function definition(): array
    {
        $title = $this->faker->sentence();

        return [
            'title' => $title,
            'slug' => $this->getSlug($title),
            'contents' => $this->faker->paragraphs(asText: true),
        ];
    }
}
