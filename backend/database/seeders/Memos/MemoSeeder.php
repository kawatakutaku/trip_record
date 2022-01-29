<?php

namespace Database\Seeders\Memos;

use App\Models\Memo;
use Database\Seeders\BaseDatabaseSeeder;
use Database\Seeders\Cities\CitySeeder;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\Users\UserSeeder;
use Illuminate\Database\Seeder;

class MemoSeeder extends BaseDatabaseSeeder
{
    const MEMO_ID = 50000;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++)
        {
            $memoId = static::MEMO_ID . $i;
            $userId = UserSeeder::USER_ID . $i;
            $cityId = CitySeeder::CITY_ID . $i;

            $memos = Memo::factory()->raw([
                'id' => $memoId,
                'user_id' => $userId,
                'city_id' => $cityId,
            ]);
            // dd($memos);

            Memo::upsert($memos, ['id']);
        }
    }
}
