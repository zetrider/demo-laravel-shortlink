<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Services\Slug\SlugService;
use PHPUnit\Framework\TestCase;

class SlugServiceTest extends TestCase
{
    /**
     * Slug empty when always exists
     *
     * @return void
     */
    public function testSlugLimit(): void
    {
        $service = new SlugService();
        $slug = $service->slug(function ($slug) {
            return false;
        });

        $this->assertEmpty($slug);
    }

    /**
     * Slug is not empty
     *
     * @return void
     */
    public function testSlugCreateable(): void
    {
        $service = new SlugService();
        $slug = $service->slug(function ($slug) {
            return true;
        });

        $this->assertNotEmpty($slug);
    }
}
