<?php

namespace Database\Seeders;

use App\Models\Response;
use Illuminate\Database\Seeder;

class ResponseSeeder extends Seeder
{
    const ID = 500;

    /**
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++) {
            $response_id = static::ID . $i;
            $user_id = UserSeeder::ID . $i;
            $trip_id= TripSeeder::ID . $i;

            $responses = Response::factory()->raw([
                'id' => $response_id,
                'user_id' => $user_id,
                'trip_id' => $trip_id,
            ]);
            Response::upsert($responses, ['id']);
        }
    }
}
