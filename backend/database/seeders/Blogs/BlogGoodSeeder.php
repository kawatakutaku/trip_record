<?php

namespace Database\Seeders\Blogs;

use App\Models\Blog;
use App\Models\BlogGood;
use Database\Seeders\Cities\CitySeeder;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\Users\UserSeeder;
use Illuminate\Database\Seeder;

class BlogGoodSeeder extends Seeder
{
    const BLOG_GOOD_ID = 100;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++)
        {
            $blogId = static::BLOG_GOOD_ID . $i;
            $userId = UserSeeder::USER_ID . $i;
            $countryId = CitySeeder::CITY_ID . $i;

            $blogGoods = BlogGood::factory()->raw([
                'id' => $blogId,
                'user_id' => $userId,
                'country_id' => $countryId,
            ]);
            BlogGood::upsert($blogGoods, ['id']);
        }
    }
}
