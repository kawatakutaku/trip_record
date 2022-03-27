<?php

namespace Database\Seeders\Memos;

use App\Models\MemoLike;
use Database\Seeders\BaseDatabaseSeeder;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\Users\UserSeeder;
use Illuminate\Database\Seeder;

class MemoLikeSeeder extends BaseDatabaseSeeder
{
    const MEMO_GOOD_ID = 20000;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++)
        {
            $MemoLikeId = static::MEMO_GOOD_ID . $i;
            $userId = UserSeeder::USER_ID . $i;
            $memoId = MemoSeeder::MEMO_DB_ID . $i;

            $MemoLikes = MemoLike::factory()->raw([
                'id' => $MemoLikeId,
                'user_id' => $userId,
                'memo_id' => $memoId,
            ]);

            MemoLike::upsert($MemoLikes, ['id']);
        }
    }
}
