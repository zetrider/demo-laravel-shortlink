<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Services\Visitor\VisitorIdService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VisitorIdTest extends TestCase
{
    /**
     * Visitor has cookie id
     *
     * @return void
     */
    public function testVisitorHasCookieId()
    {
        $service = $this->app->make(VisitorIdService::class);
        $id = $service->id();
        $key = $service->key();

        $response = $this->get('/');

        $response->assertCookie($key, $id);
    }
}
