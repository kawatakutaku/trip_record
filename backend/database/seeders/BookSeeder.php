<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    const ID = 100;
    /**
     * @return void
     */
    public function run(): void
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++) {
            $book_id = static::ID . $i;
            $user_id = UserSeeder::ID . $i;
            $genre_id = GenreSeeder::ID . $i;

            $books = Book::factory()->raw([
                'id' => $book_id,
                'user_id' => $user_id,
                'genre_id' => $genre_id,
            ]);
        }
        Book::upsert($books, ['id']);
    }
}
