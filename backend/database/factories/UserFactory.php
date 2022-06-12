<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            User::ACCOUNT_NAME => $this->faker->name(),
            User::ACCOUNT_EMAIL => $this->faker->unique()->safeEmail(),
            User::ACCOUNT_EMAIL_VERIFIED_AT => now(),
            User::ACCOUNT_PASSWORD => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            User::ACCOUNT_REMEMBER_TOKEN => Str::random(10),
            User::ACCOUNT_REGISTER_TOKEN => Str::random(10),
            User::ACCOUNT_PASSWORD_RESET_TOKEN => Str::random(10),
            // TODO: UploadedFileを使用して、jpegとかpng形式の画像ファイルを自動的に作成してもらえるようにしたい
            // User::ACCOUNT_IMG => UploadedFile::fake()->image('avator.jpeg'),
            // User::ACCOUNT_IMG => $this->faker->image(),
            User::ACCOUNT_PROFILE => $this->faker->realText(30),
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
                User::ACCOUNT_EMAIL_VERIFIED_AT => null,
            ];
        });
    }
}
