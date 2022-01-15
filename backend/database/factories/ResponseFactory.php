<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ResponseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'message' => $this->faker->realText(),
            'created_at' => $this->faker->dateTimeThisCentury(),
            'updated_at' => $this->faker->dateTimeThisCentury(),
        ];
    }
}
