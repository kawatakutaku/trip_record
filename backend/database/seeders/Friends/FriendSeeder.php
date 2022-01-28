<?php

namespace Database\Seeders\Friends;

use App\Models\Friend;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\Users\UserSeeder;
use Illuminate\Database\Seeder;

class FriendSeeder extends Seeder
{
    const FRIEND_ID = 800;

    /**
     * @return void
     */
    public function run(): void
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++) {
            $id = static::FRIEND_ID . $i;
            $owner_id = UserSeeder::USER_ID . $i;

            // TODO friend_idとowner_idをランダムに設定できるようにしたい(後から設定する)
            $friends = Friend::factory()->raw([
                'id' => $id,
                'owner_id' => $owner_id,
            ]);

            // TODO upsertしてdbに登録する
        }
    }
}
