<?php

namespace Database\Seeders\Hitchhikes\Doings;

use App\Models\Request;
use Database\Seeders\BaseDatabaseSeeder;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Database\Seeder;

class RequestSeeder extends BaseDatabaseSeeder
{
    const REQUEST_ID = 4000;
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
            $requestId = static::REQUEST_ID . $i;
            [ $driverId, $hitchhikerId ] = $this->getUsersRecord();

            $requests = Request::factory()->raw([
                'id' => $requestId,
                'driver_id' => $driverId,
                'hitchhikerId' => $hitchhikerId,
            ]);

            Request::upsert($requests, ['id']);
        }
    }
}
