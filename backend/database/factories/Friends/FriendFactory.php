<?php

namespace Database\Factories\Friends;

use Illuminate\Database\Eloquent\Factories\Factory;

class FriendFactory extends Factory
{
    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'created_at' => $this->faker->dateTimeThisDecade(),
            'updated_at' => $this->faker->dateTimeThisDecade(),
        ];
    }
}
