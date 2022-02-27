<?php

namespace Database\Seeders\Users;

use App\Models\MasterGender;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Faker\Factory;
use Illuminate\Database\Seeder;

class MasterGenderSeeder extends Seeder
{
    const GENDER_ID = 80000;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create(config('app.faker_locale'));
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++) {
            $genderId = static::GENDER_ID . $i;
            MasterGender::upsert([
                'id' => $genderId, User::ACCOUNT_GENDER => $faker->randomElement([MasterGender::MALE_USER, MasterGender::FEMALE_USER])
            ], ['id']);
        }
    }
}
