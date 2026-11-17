<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_api_health_returns_json(): void
    {
        $this->getJson('/api/health')
            ->assertOk()
            ->assertJsonPath('status', 'ok');
    }

    public function test_unknown_api_route_returns_not_found(): void
    {
        $this->get('/api/missing')
            ->assertNotFound()
            ->assertHeader('Content-Type', 'application/json');
    }
}
