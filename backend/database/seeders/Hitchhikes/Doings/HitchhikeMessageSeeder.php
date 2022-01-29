<?php

namespace Database\Seeders\Hitchhikes\Doings;

use App\Models\HitchhikeMessage;
use App\Models\User;
use Database\Seeders\BaseDatabaseSeeder;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Database\Seeder;

class HitchhikeMessageSeeder extends BaseDatabaseSeeder
{
    const HITCHHIKE_MESSAGE_ID = 2000;
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
            $hitchhikeMessageId = static::HITCHHIKE_MESSAGE_ID . $i;
            [ $driverId, $hitchhikerId ] = $this->getUsersRecord();

            $hitchhikeMessages = HitchhikeMessage::factory()->raw([
                'id' => $hitchhikeMessageId,
                'driver_id' => $driverId,
                'hitchhiker_id' => $hitchhikerId,
            ]);

            HitchhikeMessage::upsert($hitchhikeMessages, ['id']);
        }
    }
}
