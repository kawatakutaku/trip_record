<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // TODO factoryで自動的にデータを生成するようにする
        return [
            'title' => $this->faker->title(),
            'description' => $this->faker->text(),
            'img' => $this->faker->image(),
        ];
    }
}
