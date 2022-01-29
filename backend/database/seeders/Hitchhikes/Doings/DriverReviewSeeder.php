<?php

namespace Database\Seeders\Hitchhikes\Doings;

use App\Models\DriverReview;
use App\Models\User;
use Database\Seeders\BaseDatabaseSeeder;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\Users\UserSeeder;
use Illuminate\Database\Seeder;

class DriverReviewSeeder extends BaseDatabaseSeeder
{
    const DRIVER_REVIEW_ID = 900;
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
            $driverReviewId = static::DRIVER_REVIEW_ID . $i;
            [ $driverId, $hitchhikerId ] = $this->getUsersRecord();

            $driverReviews = DriverReview::factory()->raw([
                'id' => $driverReviewId,
                'driver_id' => $driverId,
                'hitchhiker_id' => $hitchhikerId,
            ]);

            DriverReview::upsert($driverReviews, ['id']);
        }
    }
}
