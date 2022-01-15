<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GenreFactory extends Factory
{
    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->title(),
        ];
    }
}
