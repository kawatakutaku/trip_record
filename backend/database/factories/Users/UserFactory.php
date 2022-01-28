<?php

namespace Database\Factories\Users;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->userName,
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'register_token' => Str::random(10),
            'password_reset_token' => Str::random(10),
            'sex' => $this->faker->randomElement(['男性', '女性']),
            'img' => $this->faker->image(),
            'profile' => $this->faker->realText(30),
            'created_at' => $this->faker->dateTimeThisDecade(),
            'updated_at' => $this->faker->dateTimeThisDecade(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
