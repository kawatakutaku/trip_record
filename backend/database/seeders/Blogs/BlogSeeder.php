<?php

namespace Database\Seeders\Blogs;

use App\Models\Blog;
use Database\Seeders\Cities\CitySeeder;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\Users\UserSeeder;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
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
            $blogId = static::BLOG_ID;
            $userId = UserSeeder::USER_ID;
            $cityId = CitySeeder::CITY_ID;

            $blogs = Blog::factory()->raw([
                'id' => $blogId,
                'user_id' => $userId,
                'city_id' => $cityId,
            ]);
            Blog::upsert($blogs, ['id']);
        }

    }
}
