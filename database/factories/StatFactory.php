<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class StatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $images = Storage::disk('commercial')->files();

        return [
            'sid' => $this->faker->uuid,
            'image' => $this->faker->randomElement($images),
        ];
    }
}
