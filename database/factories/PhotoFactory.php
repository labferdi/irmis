<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory
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
            'tags' => json_encode( $this->faker->words() ),
            'file_path' => $this->faker->file( resource_path('images') ),
            'google_id' => $this->faker->uuid(),
            'google_url' => $this->faker->url(),
            'is_active' => $this->faker->boolean(),
        ];
    }
}
