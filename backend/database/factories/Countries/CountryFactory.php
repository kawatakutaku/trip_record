<?php

namespace Database\Factories\Countries;

use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // TODO: countryかcityかどっちかに統一する
        return [
            'name' => $this->faker->country(),
        ];
    }
}
