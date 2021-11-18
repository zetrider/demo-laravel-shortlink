<?php

declare(strict_types=1);

namespace App\Services\Slug;

use Closure;
use Exception;
use Illuminate\Support\Str;

final class SlugService implements SlugServiceInterface
{
    /** @var int */
    private int $iteration = 0;

    /** @var int */
    private int $limit = 3;

    /**
     * @inheritDoc
     */
    public function slug(Closure $availableClosure): string
    {
        $this->iteration();

        $slug = Str::random(10);

        if ($availableClosure($slug)) {
            return $slug;
        }

        try {
            return $this->slug($availableClosure);
        } catch (\Throwable $th) {
            return '';
        }
    }

    /**
     * Check iteration
     *
     * @throws Exception
     * @return void
     */
    private function iteration(): void
    {
        $this->iteration++;
        if ($this->iteration > $this->limit) {
            throw new Exception('To many iterations');
        }
    }
}
