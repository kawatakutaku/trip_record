<?php

namespace Database\Seeders\Cities;

use App\Models\City;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    const CITY_ID = 500;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++)
        {
            $cityId = static::CITY_ID . $i;

            $cities = City::factory()->raw([
                'id' => $cityId,
            ]);
            City::upsert($cities, ['id']);
        }
    }
}
