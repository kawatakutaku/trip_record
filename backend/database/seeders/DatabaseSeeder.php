<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    const RECORD_NUM = 10;

    /**
     * @return void
     */
    public function run()
    {
        // TODO configらへんを日本語にして、seederで作成されるデータを日本語にする
        $this->call(LocationSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TripSeeder::class);
        $this->call(FriendSeeder::class);
        $this->call(ResponseSeeder::class);
        $this->call(GoodSeeder::class);
        $this->call(QuestionSeeder::class);
    }
}
