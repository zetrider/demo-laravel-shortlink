<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Stat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'sid',
        'image',
    ];

    /**
     * Link
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function link()
    {
        return $this->belongsTo(Link::class);
    }

    /**
     * Get image url
     *
     * @return string|null
     */
    public function getImageUrlAttribute(): ?string
    {
        $image = $this->image;

        if (is_string($image)) {
            return Storage::disk('commercial')->url($image);
        }

        return null;
    }
}
