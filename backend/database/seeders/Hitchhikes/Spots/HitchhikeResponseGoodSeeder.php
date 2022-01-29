<?php

namespace Database\Seeders\Hitchhikes\Spots;

use App\Models\HitchhikeResponseGood;
use Database\Seeders\BaseDatabaseSeeder;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\Users\UserSeeder;
use Illuminate\Database\Seeder;

class HitchhikeResponseGoodSeeder extends BaseDatabaseSeeder
{
    const HITCHHIKE_RESPONSE_GOOD_ID = 6000;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++)
        {
            $hitchhikeResponseGoodId = static::HITCHHIKE_RESPONSE_GOOD_ID . $i;
            $userId = UserSeeder::USER_ID . $i;
            $hitchhikeResponseId = HitchhikeResponseSeeder::HITCHHIKE_RESPONSE_ID . $i;

            $hitchhikeResponseGoods = HitchhikeResponseGood::factory()->raw([
                'id' => $hitchhikeResponseGoodId,
                'user_id' => $userId,
                'hitchhike_response_id' => $hitchhikeResponseGoodId
            ]);

            HitchhikeResponseGood::upsert($hitchhikeResponseGoods, ['id']);
        }
    }
}
