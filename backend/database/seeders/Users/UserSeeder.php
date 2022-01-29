<?php

namespace Database\Seeders\Users;

use App\Models\User;
use Carbon\Carbon;
use Database\Seeders\BaseDatabaseSeeder;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends BaseDatabaseSeeder
{
    const USER_ID = 70000;
    const AccountPassword = 'password';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++)
        {
            $userId = static::USER_ID . $i;

            $users = User::factory()->raw([
                'id' => $userId,
                'password' => Hash::make(static::AccountPassword),
            ]);
            User::upsert($users, ['id']);
        }

    }
}
