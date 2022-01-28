<?php

namespace Database\Seeders\Blogs;

use App\Models\Blog;
use Database\Seeders\Countries\CountrySeeder;
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
        // TODO: blog_goodじゃなくて、blogの記述になっているから変更する
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++)
        {
            $blogId = static::BLOG_ID . $i;
            $userId = UserSeeder::USER_ID . $i;
            $countryId = CountrySeeder::ID . $i;

            $blogs = Blog::factory()->raw([
                'id' => $blogId,
                'user_id' => $userId,
                'country_id' => $countryId,
            ]);

        }
        //
    }
}
