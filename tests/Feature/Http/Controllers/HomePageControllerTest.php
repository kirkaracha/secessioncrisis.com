<?php

declare(strict_types=1);

namespace Feature\Http\Controllers;

use Tests\TestCase;

final class HomePageControllerTest extends TestCase
{
    public function test_index_returns_a_successful_response(): void
    {
        // Act
        $response = $this->get(uri: route(name: 'home.index'));

        // Assert
        $response->assertOk();
    }

    public function test_index_renders_the_home_index_view(): void
    {
        // Act
        $response = $this->get(uri: route(name: 'home.index'));

        // Assert
        $response->assertViewIs(value: 'home.index');
    }
}
