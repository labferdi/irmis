<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoAlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'google_id' => $this->faker->uuid(),
            'google_url' => $this->faker->url(),
            'is_active' => $this->faker->boolean(),
        ];
    }
}
