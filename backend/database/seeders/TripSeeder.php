<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    const ID = 600;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++) {
            $trip_id = static::ID . $i;
            $user_id = UserSeeder::ID . $i;
            $location_id = LocationSeeder::ID . $i;

            $trips = Trip::factory()->raw([
                'id' => $trip_id,
                'user_id' => $user_id,
                'location_id' => $location_id,
            ]);
            Trip::upsert($trips, ['id']);
        }
    }
}
