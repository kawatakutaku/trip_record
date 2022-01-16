<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    const ID = 300;

    /**
     * @return void
     */
    public function run(): void
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++) {
            $genre_id = static::ID . $i;

            $genres = Genre::factory()->raw([
                'id' => $genre_id,
            ]);

            Genre::upsert($genres, ['id']);
        }
    }
}
