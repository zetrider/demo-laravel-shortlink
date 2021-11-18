<?php

declare(strict_types=1);

namespace App\Services\Slug;

use Closure;

interface SlugServiceInterface
{
    /**
     * @param Closure $availableClosure
     * @return string
     */
    public function slug(Closure $availableClosure): string;
}
