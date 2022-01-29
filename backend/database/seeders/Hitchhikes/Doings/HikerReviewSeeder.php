<?php

namespace Database\Seeders\Hitchhikes\Doings;

use App\Models\HikerReview;
use App\Models\User;
use Database\Seeders\BaseDatabaseSeeder;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Database\Seeder;

class HikerReviewSeeder extends BaseDatabaseSeeder
{
    const HIKER_REVIEW_ID = 1000;
    protected $needUsers = true;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++)
        {
            $hikerReviewId = static::HIKER_REVIEW_ID . $i;
            [ $driverId, $hitchhikerId ] = $this->getUsersRecord();

            $hikerReviews = HikerReview::factory()->raw([
                'id' => $hikerReviewId,
                'driver_id' => $driverId,
                'hitchhiker_id' => $hitchhikerId,
            ]);

            HikerReview::upsert($hikerReviews, ['id']);
        }
    }
}
