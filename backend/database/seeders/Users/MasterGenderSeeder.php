<?php

namespace Database\Seeders\Users;

use App\Models\MasterGender;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Faker\Factory;
use Illuminate\Database\Seeder;

class MasterGenderSeeder extends Seeder
{
    const GENDER_MALE_ID = 1;
    const GENDER_FEMALE_ID = 2;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MasterGender::upsert([
            [ 'id' => static::GENDER_MALE_ID, User::ACCOUNT_GENDER => MasterGender::MALE_USER ],
            [ 'id' => static::GENDER_FEMALE_ID, User::ACCOUNT_GENDER => MasterGender::FEMALE_USER],
        ], ['id']);

    }
}
