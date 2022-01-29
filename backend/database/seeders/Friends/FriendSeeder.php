<?php

namespace Database\Seeders\Friends;

use App\Models\Friend;
use App\Models\User;
use Database\Seeders\BaseDatabaseSeeder;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\Users\UserSeeder;
use Illuminate\Database\Seeder;

class FriendSeeder extends BaseDatabaseSeeder
{
    const FRIEND_ID = 800;
    protected $needUsers = true;

    /**
     * @return void
     */
    public function run(): void
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++) {
            $id = static::FRIEND_ID . $i;
            [ $ownerId, $friendId ] = $this->getUsersRecord();

            $friends = Friend::factory()->raw([
                'id' => $id,
                'owner_id' => $ownerId,
                'friend_id' => $friendId,
            ]);

            Friend::upsert($friends, ['id']);
        }
    }
}
