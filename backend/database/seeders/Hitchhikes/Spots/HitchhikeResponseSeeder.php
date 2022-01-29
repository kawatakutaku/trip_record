<?php

namespace Database\Seeders\Hitchhikes\Spots;

use App\Models\Hitchhike;
use App\Models\HitchhikeGood;
use App\Models\HitchhikeResponse;
use Database\Seeders\BaseDatabaseSeeder;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\Users\UserSeeder;
use Illuminate\Database\Seeder;

class HitchhikeResponseSeeder extends BaseDatabaseSeeder
{
    const HITCHHIKE_RESPONSE_ID = 7000;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++)
        {
            $hitchhikeResponseId = static::HITCHHIKE_RESPONSE_ID . $i;
            $hitchhikeId = HitchhikeSeeder::HITCHHIKE_ID . $i;
            $userId = UserSeeder::USER_ID . $i;

            $hitchhikeResponses = HitchhikeResponse::factory()->raw([
                'id' => $hitchhikeResponseId,
                'user_id' => $userId,
                'hitchhike_id' => $hitchhikeId,
            ]);

            HitchhikeResponse::upsert($hitchhikeResponses, ['id']);
        }
    }
}
