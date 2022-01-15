<?php

namespace Database\Seeders;

use App\Models\Response;
use Illuminate\Database\Seeder;

class ResponseSeeder extends Seeder
{
    const ID = 600;

    /**
     * @return void
     */
    public function run()
    {
        // TODO user_id, book_idを取得する
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++) {
            $response_id = static::ID . $i;

            $responses = Response::factory()->raw([
                'id' => $response_id,
            ]);
        }
        Response::upsert($responses, ['id']);
    }
}
