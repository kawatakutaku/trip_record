<?php

namespace Database\Seeders\Memos;

use App\Models\MemoResponse;
use Database\Seeders\BaseDatabaseSeeder;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\Users\UserSeeder;
use Illuminate\Database\Seeder;

class MemoResponseSeeder extends BaseDatabaseSeeder
{
    const MEMO_RESPONSE_ID = 40000;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++)
        {
            $memoResponseId = static::MEMO_RESPONSE_ID . $i;
            $userId = UserSeeder::USER_ID . $i;
            $memoId = MemoSeeder::MEMO_DB_ID . $i;

            $memoResponses = MemoResponse::factory()->raw([
                'id' => $memoResponseId,
                'user_id' => $userId,
                'memo_id' => $memoId
            ]);

            MemoResponse::upsert($memoResponses, ['id']);
        }
    }
}
