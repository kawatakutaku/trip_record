<?php

namespace Database\Factories\Hitchhikes\Spots;

use Illuminate\Database\Eloquent\Factories\Factory;

class HitchhikeFactory extends Factory
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
            'spot_address' => $this->faker->address(),
            'recommended_spot' => $this->faker->city(),
            'created_at' => $this->faker->dateTimeThisDecade(),
            'updated_at' => $this->faker->dateTimeThisDecade(),
        ];
    }
}
