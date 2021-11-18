<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class LinkResource extends JsonResource
{
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string|null
     */
    public static $wrap = null;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'url' => $this->url,
            'short' => $this->short,
            'commercial' => $this->commercial,
            'expired_at' => $this->expired_at instanceof Carbon ? $this->expired_at->toFormattedDateString() : null,
            'created_at' => $this->expired_at instanceof Carbon ? $this->expired_at->toFormattedDateString() : null,
        ];
    }
}
