<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->title(),
            'member_num' => $this->faker->randomDigit(),
        ];
    }
}
