<?php

namespace Database\Seeders\Users;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Database\Seeder;

class FriendSeeder extends Seeder
{
    const ID = 200;

    /**
     * @return void
     */
    public function run(): void
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++) {
            $id = static::ID . $i;
            $owner_id = UserSeeder::ID . $i;

            // TODO friend_idとowner_idをランダムに設定できるようにしたい(後から設定する)
            $friends = Friend::factory()->raw([
                'id' => $id,
                'owner_id' => $owner_id,
            ]);

            // TODO upsertしてdbに登録する
        }
    }
}
