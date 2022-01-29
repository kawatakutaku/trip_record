<?php

namespace Database\Seeders\Cities;

use App\Models\Tourist;
use Database\Seeders\BaseDatabaseSeeder;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\Users\UserSeeder;
use Illuminate\Database\Seeder;

class TouristSeeder extends BaseDatabaseSeeder
{
    const TOURIST_ID = 700;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++)
        {
            $touristId = static::TOURIST_ID . $i;
            $userId = UserSeeder::USER_ID . $i;

            $tourists = Tourist::factory()->raw([
                'id' => $touristId,
                'user_id' => $userId
            ]);
            Tourist::upsert($tourists, ['id']);
        }
    }
}
