<?php

namespace Database\Seeders\Memos;

use App\Models\MemoResponseGood;
use Database\Seeders\BaseDatabaseSeeder;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\Users\UserSeeder;
use Illuminate\Database\Seeder;

class MemoResponseGoodSeeder extends BaseDatabaseSeeder
{
    const MEMO_RESPONSE_GOOD_ID = 30000;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++)
        {
            $memoResponseGoodId = static::MEMO_RESPONSE_GOOD_ID . $i;
            $userId = UserSeeder::USER_ID . $i;
            $memoResponseId = MemoResponseSeeder::MEMO_RESPONSE_ID . $i;

            $memoResponseGoods = MemoResponseGood::factory()->raw([
                'id' => $memoResponseGoodId,
                'user_id' => $userId,
                'memo_response_id' => $memoResponseId,
            ]);

            MemoResponseGood::upsert($memoResponseGoods, ['id']);
        }
    }
}
