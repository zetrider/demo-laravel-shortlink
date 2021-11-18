<?php

declare(strict_types=1);

namespace App\Http\Actions\Visit;

use App\Models\Link;
use App\Models\Stat;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

final class VisitAction implements VisitActionInterface
{
    /**
     * @inheritDoc
     */
    public function visit(Link $link): Stat
    {
        return $link->stats()->create([
            'sid' => request()->get('visitor_id'),
            'image' => $this->image($link),
        ]);
    }

    /**
     * @inheritDoc
     */
    public function image(Link $link): ?string
    {
        if ($link->commercial) {
            $images = Storage::disk('commercial')->files();
            if (count($images)) {
                $image = Arr::random($images);
                if (is_string($image)) {
                    return $image;
                }
            }
        }

        return null;
    }
}
