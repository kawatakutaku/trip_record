<?php

namespace Database\Seeders\Questions;

use App\Models\Question;
use Database\Seeders\BaseDatabaseSeeder;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\Users\UserSeeder;
use Illuminate\Database\Seeder;

class QuestionSeeder extends BaseDatabaseSeeder
{
    const QUESTION_ID = 60000;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<DatabaseSeeder::RECORD_NUM; $i++)
        {
            $questionId = static::QUESTION_ID . $i;
            $userId = UserSeeder::USER_ID . $i;

            $questions = Question::factory()->raw([
                'id' => $questionId,
                'userId' => $userId,
            ]);

            Question::upsert($questions, ['id']);
        }
    }
}
