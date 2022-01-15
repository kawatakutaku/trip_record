<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ResponseFactory extends Factory
{
    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'message' => $this->faker->realText(),
            'created_at' => $this->faker->dateTimeThisCentury(),
            'updated_at' => $this->faker->dateTimeThisCentury(),
        ];
    }
}
