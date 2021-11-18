<?php

declare(strict_types=1);

namespace App\Http\Actions\Visit;

use App\Models\Link;
use App\Models\Stat;

interface VisitActionInterface
{
    /**
     * Save visit
     *
     * @param Link $link
     * @return Stat
     */
    public function visit(Link $link): Stat;

    /**
     * Get an image if needed
     *
     * @param Link $link
     * @return string|null
     */
    public function image(Link $link): ?string;
}
