<?php

namespace Database\Seeders\Blogs;

use App\Models\Blog;
use App\Models\BlogGood;
use App\Models\City;
use Database\Seeders\BaseDatabaseSeeder;
use Database\Seeders\Cities\CitySeeder;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\Users\UserSeeder;
use Illuminate\Database\Seeder;

class BlogGoodSeeder extends BaseDatabaseSeeder
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
            $blogGoodId = static::BLOG_GOOD_ID . $i;
            $userId = UserSeeder::USER_ID . $i;
            $cityId = City::inRandomOrder()->first()->id;
            $blogId = BlogSeeder::BLOG_ID . $i;

            $blogGoods = BlogGood::factory()->raw([
                'id' => $blogGoodId,
                'user_id' => $userId,
                'city_id' => $cityId,
                'blog_id' => $blogId,
            ]);
            BlogGood::upsert($blogGoods, ['id']);
        }
    }
}
