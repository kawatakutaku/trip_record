<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    const ID = 700;
    const AccountPassword = 'password';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++) {
            $user_id = static::ID . $i;

            $users = User::factory()->raw([
                'id' => $user_id,
                'password' => Hash::make(static::AccountPassword),
            ]);
            User::upsert($users, ['id']);
        }

    }
}
