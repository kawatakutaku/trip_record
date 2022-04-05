<?php

namespace Database\Seeders\Users;

use App\Models\MasterGender;
use App\Models\User;
use Carbon\Carbon;
use Database\Seeders\BaseDatabaseSeeder;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends BaseDatabaseSeeder
{
    const USER_ID = 70000;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++) {
            $userId = static::USER_ID . $i;
            $genderId = MasterGender::inRandomOrder()->first()->id;

            $users = User::factory()->raw([
                'id' => $userId,
                User::ACCOUNT_GENDER => $genderId,
                User::ACCOUNT_IMG => 'profileName.jpg',
                User::ACCOUNT_PASSWORD => Hash::make(User::ACCOUNT_PASSWORD),
            ]);
            User::upsert($users, ['id']);
        }

    }
}
