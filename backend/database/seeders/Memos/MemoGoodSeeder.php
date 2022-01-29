<?php

namespace Database\Seeders\Memos;

use App\Models\MemoGood;
use Database\Seeders\BaseDatabaseSeeder;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\Users\UserSeeder;
use Illuminate\Database\Seeder;

class MemoGoodSeeder extends BaseDatabaseSeeder
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
            $memoGoodId = static::MEMO_GOOD_ID . $i;
            $userId = UserSeeder::USER_ID . $i;
            $memoId = MemoSeeder::MEMO_ID . $i;

            $memoGoods = MemoGood::factory()->raw([
                'id' => $memoGoodId,
                'user_id' => $userId,
                'memo_id' => $memoId,
            ]);

            MemoGood::upsert($memoGoods, ['id']);
        }
    }
}
