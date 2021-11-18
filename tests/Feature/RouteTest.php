<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RouteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test redirect routes
     *
     * @return void
     */
    public function testRoute302(): void
    {
        $routes = [
            route('index'),
        ];
        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(302);
        }
    }

    /**
     * Test 200 status
     *
     * @return void
     */
    public function testRoute200(): void
    {
        $routes = [
            route('stat.index'),
            route('links.create'),
        ];
        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
        }
    }

    /**
     * Test 404 status
     *
     * @return void
     */
    public function testRoute404(): void
    {
        $routes = [
            route('links.show', '1'),
            route('visit.index', '1'),
        ];
        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(404);
        }
    }

    /**
     * Test request validation routes
     *
     * @return void
     */
    public function testRouteRequestValidation(): void
    {
        $routes = [
            route('links.store'),
        ];
        foreach ($routes as $route) {
            $response = $this->post($route);
            $response->assertSessionHasErrors();
        }
    }
}
