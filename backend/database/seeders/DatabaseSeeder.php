<?php

namespace Database\Seeders;

use Database\Seeders\Blogs\BlogGoodSeeder;
use Database\Seeders\Blogs\BlogResponseGoodSeeder;
use Database\Seeders\Blogs\BlogResponseSeeder;
use Database\Seeders\Blogs\BlogSeeder;
use Database\Seeders\Cities\CitySeeder;
use Database\Seeders\Cities\FavoriteCitySeeder;
use Database\Seeders\Cities\TouristSeeder;
use Database\Seeders\Friends\FriendSeeder;
use Database\Seeders\Hitchhikes\Doings\DriverReviewSeeder;
use Database\Seeders\Hitchhikes\Doings\HikerReviewSeeder;
use Database\Seeders\Hitchhikes\Doings\HitchhikeMessageSeeder;
use Database\Seeders\Hitchhikes\Doings\PickUpSeeder;
use Database\Seeders\Hitchhikes\Doings\RequestSeeder;
use Database\Seeders\Hitchhikes\Spots\HitchhikeGoodSeeder;
use Database\Seeders\Hitchhikes\Spots\HitchhikeResponseGoodSeeder;
use Database\Seeders\Hitchhikes\Spots\HitchhikeResponseSeeder;
use Database\Seeders\Hitchhikes\Spots\HitchhikeSeeder;
use Database\Seeders\Hitchhikes\Spots\SuccessSeeder;
use Database\Seeders\Memos\DirectMessageSeeder;
use Database\Seeders\Memos\MemoGoodSeeder;
use Database\Seeders\Memos\MemoResponseGoodSeeder;
use Database\Seeders\Memos\MemoResponseSeeder;
use Database\Seeders\Memos\MemoSeeder;
use Database\Seeders\Questions\QuestionSeeder;
use Database\Seeders\Users\MasterGenderSeeder;
use Database\Seeders\Users\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    const RECORD_NUM = 10;

    /**
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(MasterGenderSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(FriendSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(BlogResponseSeeder::class);
        $this->call(BlogGoodSeeder::class);
        $this->call(BlogResponseGoodSeeder::class);
        $this->call(MemoSeeder::class);
        $this->call(MemoGoodSeeder::class);
        $this->call(MemoResponseSeeder::class);
        $this->call(MemoResponseGoodSeeder::class);
        $this->call(DirectMessageSeeder::class);
        $this->call(TouristSeeder::class);
        $this->call(FavoriteCitySeeder::class);
        $this->call(HitchhikeSeeder::class);
        $this->call(HitchhikeGoodSeeder::class);
        $this->call(HitchhikeResponseSeeder::class);
        $this->call(SuccessSeeder::class);
        $this->call(HitchhikeResponseGoodSeeder::class);
        $this->call(DriverReviewSeeder::class);
        $this->call(HikerReviewSeeder::class);
        $this->call(PickUpSeeder::class);
        $this->call(RequestSeeder::class);
        $this->call(HitchhikeMessageSeeder::class);
    }
}
