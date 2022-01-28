<?php

namespace Database\Seeders\Blogs;

use App\Models\BlogResponse;
use App\Models\BlogResponseGood;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\Users\UserSeeder;
use Illuminate\Database\Seeder;

class BlogResponseGoodSeeder extends Seeder
{
    const BLOG_RESPONSE_GOOD_ID = 200;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++)
        {
            $blogResponseGoodId = static::BLOG_RESPONSE_GOOD_ID . $i;
            $userId = UserSeeder::USER_ID . $i;
            $blogResponseId = BlogResponseSeeder::BLOG_RESPONSE_ID . $i;

            $blogResponseGoods = BlogResponseGood::factory()->raw([
                'id' => $blogResponseGoodId,
                'user_id' => $userId,
                'blog_response_id' => $blogResponseId,
            ]);
            BlogResponseGood::upsert($blogResponseGoods, ['id']);
        }
    }
}
