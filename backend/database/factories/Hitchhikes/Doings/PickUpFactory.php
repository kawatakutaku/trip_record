<?php

namespace Database\Factories\Hitchhikes\Doings;

use Illuminate\Database\Eloquent\Factories\Factory;

class PickUpFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_at' => $this->faker->dateTimeThisDecade(),
            'updated_at' => $this->faker->dateTimeThisDecade(),
        ];
    }
}
