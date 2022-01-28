<?php

namespace Database\Seeders\Cities;

use App\Models\FavoriteCity;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\Users\UserSeeder;
use Illuminate\Database\Seeder;

class FavoriteCitySeeder extends Seeder
{
    const FAVORITE_CITY_ID = 600;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++)
        {
            $favoriteCityId = static::FAVORITE_CITY_ID . $i;
            $userId = UserSeeder::USER_ID . $i;
            $cityId = CitySeeder::CITY_ID . $i;

            $favoriteCities = FavoriteCity::factory()->raw([
                'id' => $favoriteCityId,
                'user_id' => $userId,
                'city_id' => $cityId,
            ]);
            FavoriteCity::upsert($favoriteCities, ['id']);
        }
    }
}
