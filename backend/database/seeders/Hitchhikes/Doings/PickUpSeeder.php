<?php

namespace Database\Seeders\Hitchhikes\Doings;

use App\Models\PickUp;
use Database\Seeders\BaseDatabaseSeeder;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Database\Seeder;

class PickUpSeeder extends BaseDatabaseSeeder
{
    const PICK_UP_ID = 3000;
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
            $pickUpId = static::PICK_UP_ID . $i;
            [ $driverId, $hitchhikerId ] = $this->getUsersRecord();

            $pickUps = PickUp::factory()->raw([
                'id' => $pickUpId,
                'driver_id' => $driverId,
                'hitchhiker_id' => $hitchhikerId,
            ]);

            PickUp::upsert($pickUps, ['id']);
        }
    }
}
