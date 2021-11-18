<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => $this->faker->url,
            'slug' => Str::limit($this->faker->uuid, 10, null),
            'expired_at' => now()->addDay(),
            'commercial' => true,
        ];
    }
}
