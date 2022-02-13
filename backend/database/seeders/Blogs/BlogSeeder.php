<?php

namespace Database\Seeders\Blogs;

use App\Models\Blog;
use App\Models\City;
use Database\Seeders\BaseDatabaseSeeder;
use Database\Seeders\Cities\CitySeeder;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\Users\UserSeeder;
use Illuminate\Database\Seeder;

class BlogSeeder extends BaseDatabaseSeeder
{
    const BLOG_ID = 400;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++)
        {
            $blogId = static::BLOG_ID . $i;
            $userId = UserSeeder::USER_ID . $i;
            $cityId = City::inRandomOrder()->first()->id;

            $blogs = Blog::factory()->raw([
                'id' => $blogId,
                'user_id' => $userId,
                'city_id' => $cityId,
            ]);

            Blog::upsert($blogs, ['id']);
        }

    }
}
