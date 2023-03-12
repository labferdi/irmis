<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
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
                "url" =>  "https://i.ytimg.com/vi/VbS3wAMBSpM/default.jpg",
                "width" =>  120
            ],
            "medium" =>  [
                "height" =>  180,
                "url" =>  "https://i.ytimg.com/vi/VbS3wAMBSpM/mqdefault.jpg",
                "width" =>  320
            ],
            "high" =>  [
                "height" =>  360,
                "url" =>  "https://i.ytimg.com/vi/VbS3wAMBSpM/hqdefault.jpg",
                "width" =>  480
            ]
        ];
        return [
            'name' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'thumbnail' => json_encode($sample),
            'google_id' => $this->faker->uuid(),
            'is_active' => $this->faker->boolean(),
            'comment' => $this->faker->numberBetween(0, 1000),
            'dislike' => $this->faker->numberBetween(0, 1000),
            'like' => $this->faker->numberBetween(0, 1000),
            'favorite' => $this->faker->numberBetween(0, 1000),
            'view' => $this->faker->numberBetween(0, 1000),
        ];
    }
}
