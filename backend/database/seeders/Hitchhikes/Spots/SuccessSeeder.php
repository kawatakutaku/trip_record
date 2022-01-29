<?php

namespace Database\Seeders\Hitchhikes\Spots;

use App\Models\Hitchhike;
use App\Models\Success;
use Database\Seeders\BaseDatabaseSeeder;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\Users\UserSeeder;
use Illuminate\Database\Seeder;

class SuccessSeeder extends BaseDatabaseSeeder
{
    const SUCCESS_ID = 9000;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++)
        {
            $successId = static::SUCCESS_ID . $i;
            $userId = UserSeeder::USER_ID . $i;
            $hitchhikeId = HitchhikeSeeder::HITCHHIKE_ID . $i;

            $successes = Success::factory()->raw([
                'id' => $successId,
                'user_id' => $userId,
                'hitchhike_id' => $hitchhikeId
            ]);

            Success::upsert($successes, ['id']);
        }
    }
}
