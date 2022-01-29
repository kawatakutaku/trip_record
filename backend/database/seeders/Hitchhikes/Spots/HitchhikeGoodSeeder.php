<?php

namespace Database\Seeders\Hitchhikes\Spots;

use App\Models\Hitchhike;
use App\Models\HitchhikeGood;
use App\Models\User;
use Database\Seeders\BaseDatabaseSeeder;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\Users\UserSeeder;
use Illuminate\Database\Seeder;

class HitchhikeGoodSeeder extends BaseDatabaseSeeder
{
    const HITCHHIKE_GOOD_ID = 5000;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++)
        {
            $hitchhikeGoodId = static::HITCHHIKE_GOOD_ID . $i;
            $userId = UserSeeder::USER_ID . $i;
            $hitchhikeId = HitchhikeSeeder::HITCHHIKE_ID . $i;

            $hitchhikeGoods = HitchhikeGood::factory()->raw([
                'id' => $hitchhikeGoodId,
                'user_id' => $userId,
                'hitchhikeId' => $hitchhikeId,
            ]);

            HitchhikeGood::upsert($hitchhikeGoods, ['id']);
        }
    }
}
