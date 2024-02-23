<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;

class QuestionSeeder extends Seeder
{

    use TruncateTable, DisableForeignKeys;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKeys();

        $this->truncate('questions');

        $questionsCategoriesGroup = include(database_path('data/initial_questions.php'));

        foreach ($questionsCategoriesGroup as $category) {
            foreach ($category as $question => $field) {
                Question::create([
                    'question' => $field['question'],
                    'answer' => $field['answer'],
                    'opt_1' => $field['opt_1'],
                    'opt_2' => $field['opt_2'],
                    'opt_3' => $field['opt_3'],
                    'category_id' => $field['category_id'],
                    'score' => $field['score']
                ]);
            }
        }

        $sumo_questions = include(database_path('data/sumo_questions.php'));

        foreach ($sumo_questions as $question => $field) {
            Question::create([
                'question' => $field['question'],
                'answer' => $field['answer'],
                'opt_1' => $field['opt_1'],
                'opt_2' => $field['opt_2'],
                'opt_3' => $field['opt_3'],
                'category_id' => $field['category_id'],
                'user_id' => 3,
                'score' => $field['score']
            ]);
        }

        $sumerio_questions = include(database_path('data/sumerio_questions.php'));

        foreach ($sumerio_questions as $question => $field) {
            Question::create([
                'question' => $field['question'],
                'answer' => $field['answer'],
                'opt_1' => $field['opt_1'],
                'opt_2' => $field['opt_2'],
                'opt_3' => $field['opt_3'],
                'category_id' => $field['category_id'],
                'user_id' => 4,
                'score' => $field['score']
            ]);
        }




        $this->enableForeignKeys();
    }
}
