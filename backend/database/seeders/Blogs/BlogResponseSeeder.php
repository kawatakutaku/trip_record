<?php

namespace Database\Seeders\Blogs;

use App\Models\Blog;
use App\Models\BlogResponse;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\Users\UserSeeder;
use Illuminate\Database\Seeder;

class BlogResponseSeeder extends Seeder
{
    const BLOG_RESPONSE_ID = 300;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++)
        {
            $blogResponseId = static::BLOG_RESPONSE_ID . $i;
            $userId = UserSeeder::USER_ID . $i;
            $blogId = BlogSeeder::BLOG_ID . $i;

            $blogResponses = BlogResponse::factory()->raw([
                'id' => $blogResponseId,
                'user_id' => $userId,
                'blog_id' => $blogId,
            ]);
            BlogResponse::upsert($blogResponses, ['id']);
        }
    }
}
