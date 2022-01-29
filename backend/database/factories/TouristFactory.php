<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TouristFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'spot' => $this->faker->city(),
            'information' => $this->faker->realText(),
        ];
    }
}
