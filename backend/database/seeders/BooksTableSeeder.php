<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // TODO Tripのseederを削除する
    public function run()
    {
        $user = DB::table('users')->first();
        $book = Book::factory()->raw('user_id', $user->id);

        for ($i=0; $i<10; $i++) {
            Book::upsert($book, 'id');
        }
    }
}
