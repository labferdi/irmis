<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VideoAlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sample = [
            "default" =>  [
                "height" =>  90,
                "url" =>  "https://i.ytimg.com/vi/uJnjYMav87Q/default.jpg",
                "width" =>  120
            ],
            "medium" =>  [
                "height" =>  180,
                "url" =>  "https://i.ytimg.com/vi/uJnjYMav87Q/mqdefault.jpg",
                "width" =>  320
            ],
            "high" =>  [
                "height" =>  360,
                "url" =>  "https://i.ytimg.com/vi/uJnjYMav87Q/hqdefault.jpg",
                "width" =>  480
            ]
        ];
        return [
            'name' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'thumbnail' => json_encode($sample),
            'google_id' => $this->faker->uuid(),
            'is_active' => $this->faker->boolean(),
        ];
    }
}
