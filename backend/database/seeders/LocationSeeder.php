<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    const ID = 300;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++) {
            $location_id = static::ID . $i;

            $locations = Location::factory()->raw([
                'id' => $location_id,
            ]);
            Location::upsert($locations, ['id']);
        }
    }
}
