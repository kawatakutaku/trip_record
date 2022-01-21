<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    const ID = 400;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++) {
            $question_id = static::ID . $i;
            $user_id = UserSeeder::ID . $i;

            $questions = Question::factory()->raw([
                'id' => $question_id,
                'user_id' => $user_id,
            ]);
            Question::upsert($questions, ['id']);
        }
    }
}
