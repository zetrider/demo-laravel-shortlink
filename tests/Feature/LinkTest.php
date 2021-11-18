<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Link;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LinkTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test create link
     *
     * @return void
     */
    public function testCreateLink(): void
    {
        $link = Link::factory()->make();
        $this->post(route('links.store'), $link->toArray());

        $this->assertDatabaseHas('links', [
            'slug' => $link->slug,
        ]);
    }

    /**
     * Test show link
     *
     * @return void
     */
    public function testShowLink(): void
    {
        $link = Link::factory()->create();

        $response = $this->get(route('links.show', $link->slug));

        $response->assertStatus(200);
    }

    /**
     * Test visit commercial link
     *
     * @return void
     */
    public function testVisitCommercialLink(): void
    {
        $link = Link::factory()->create([
            'commercial' => true,
        ]);

        $response = $this->get(route('visit.index', $link->slug));

        $response->assertStatus(200);
    }

    /**
     * Test visit not commercial link
     *
     * @return void
     */
    public function testVisitNotCommercialLink(): void
    {
        $link = Link::factory()->create([
            'commercial' => false,
        ]);

        $response = $this->get(route('visit.index', $link->slug));

        $response->assertStatus(302);
    }

    /**
     * Test visit not commercial link
     *
     * @return void
     */
    public function testLinkStatHasSid(): void
    {
        $link = Link::factory()->create();

        $this->get(route('visit.index', $link->slug));

        $stat = $link->stats()->first();

        $this->assertNotEmpty($stat->sid);
    }

    /**
     * Test visit not commercial link
     *
     * @return void
     */
    public function testCommercialLinkStatHasImage(): void
    {
        $link = Link::factory()->create([
            'commercial' => true,
        ]);

        $this->get(route('visit.index', $link->slug));

        $stat = $link->stats()->first();

        $this->assertNotEmpty($stat->image);
    }
}
