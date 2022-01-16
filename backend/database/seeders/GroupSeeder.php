<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    const ID = 500;
    /**
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++) {
            $group_id = static::ID . $i;

            $groups = Group::factory()->raw([
                'id' => $group_id,
            ]);

            Group::upsert($groups, ['id']);
        }
    }
}
