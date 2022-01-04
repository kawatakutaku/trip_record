<?php

namespace Database\Seeders;

use App\Models\Trip;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->first();

        // TODO factoryを使って、自動的にデータを生成する方法を採用する
        $trip_names = ['家', '空港', '港'];
        $start_days = ['2021-12-31', '2022-1-1', '2022-1-2'];
        $end_days = ['2021-12-31', '2022-1-1', '2022-1-2'];

        for ($i=0; $i<3; $i++) {
            DB::table('trips')->insert([
                'user_id' => $user->id,
                'trip_name' => $trip_names[$i],
                'start_day' => $start_days[$i],
                'end_day' => $end_days[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
