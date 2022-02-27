<?php

namespace Database\Factories;

use App\Models\Memo;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            Memo::MEMO_MEMO => $this->faker->realText(),
            Memo::MEMO_IMG => $this->faker->imageUrl(),
        ];
    }
}
