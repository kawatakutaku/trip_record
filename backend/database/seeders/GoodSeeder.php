<?php

namespace Database\Seeders;

use App\Models\Good;
use Illuminate\Database\Seeder;

class GoodSeeder extends Seeder
{
    const ID = 400;
    /**
     * @return void
     */
    public function run(): void
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++) {
            $good_id = static::ID . $i;
            $user_id = UserSeeder::ID . $i;
            $book_id = BookSeeder::ID . $i;

            $goods = Good::factory()->raw([
                'id' => $good_id,
                'user_id' => $user_id,
                'book_id' => $book_id,
            ]);

            Good::upsert($goods, ['id']);
        }
    }
}
