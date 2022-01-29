<?php

namespace Database\Seeders\Memos;

use App\Models\DirectMessage;
use Database\Seeders\BaseDatabaseSeeder;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Database\Seeder;

class DirectMessageSeeder extends BaseDatabaseSeeder
{
    const DIRECT_MESSAGE_ID = 10000;
    protected $needUsers = true;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++)
        {
            $directMessageId = static::DIRECT_MESSAGE_ID . $i;
            [ $userId, $partnerId ] = $this->getUsersRecord();

            $directMessages = DirectMessage::factory()->raw([
                'id' => $directMessageId,
                'user_id' => $userId,
                'partner_id' => $partnerId
            ]);

            DirectMessage::upsert($directMessages, ['id']);
        }
    }
}
