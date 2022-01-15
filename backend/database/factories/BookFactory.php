<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->realText(),
            'img' => $this->faker->image(),
            'created_at' => $this->faker->dateTimeThisCentury(),
            'updated_at' => $this->faker->dateTimeThisCentury(),
        ];
    }
}
