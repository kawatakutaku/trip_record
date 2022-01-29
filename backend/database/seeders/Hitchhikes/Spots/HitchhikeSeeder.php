<?php

namespace Database\Seeders\Hitchhikes\Spots;

use App\Models\Hitchhike;
use Database\Seeders\BaseDatabaseSeeder;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\Users\UserSeeder;
use Illuminate\Database\Seeder;

class HitchhikeSeeder extends BaseDatabaseSeeder
{
    const HITCHHIKE_ID = 8000;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++)
        {
            $hitchhikeId = static::HITCHHIKE_ID . $i;
            $userId = UserSeeder::USER_ID . $i;

            $hitchhikes = Hitchhike::factory()->raw([
                'id' => $hitchhikeId,
                'user_id' => $userId
            ]);

            Hitchhike::upsert($hitchhikes, ['id']);
        }
    }
}
