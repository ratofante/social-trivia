<?php

namespace App\Repositories;

use App\Models\Question;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Exceptions\QuestionRepositoryException;

class QuestionRepository extends BaseRepository
{
    public function create($attributes)
    {
        try {
            return DB::transaction(function () use ($attributes) {
                $created = Question::query()->create([
                    'question' => data_get($attributes, 'question'),
                    'answer' => data_get($attributes, 'answer'),
                    'opt_1' => data_get($attributes, 'opt_1'),
                    'opt_2' => data_get($attributes, 'opt_2'),
                    'opt_3' => data_get($attributes, 'opt_3'),
                    'score' => data_get($attributes, 'score', 50),
                    'category_id' => data_get($attributes, 'category_id')
                ]);

                return $created;
            });
        } catch (QueryException $e) {
            throw new QuestionRepositoryException('Failed to create question: ' . $e->getMessage(), $e->getCode(), $e);
        } catch (\Exception $e) {
            throw new QuestionRepositoryException('Failed to create question: ' . $e->getMessage(), $e->getCode(), $e);
        }
    }

    public function update($question, $attributes)
    {
        DB::transaction(function () use ($question, $attributes) {

            $updated = $question->update([
                'question' => data_get($attributes, 'question', $question->question),
                'answer' => data_get($attributes, 'answer', $question->answer),
                'opt_1' => data_get($attributes, 'opt_1', $question->opt_1),
                'opt_2' => data_get($attributes, 'opt_2', $question->opt_2),
                'opt_3' => data_get($attributes, 'opt_3', $question->opt_3),
                'score' => data_get($attributes, 'score', $question->score),
                'category_id' => data_get($attributes, 'category_id', $question->category_id)
            ]);

            //Exception if !$updated;

            return $question;
        });
    }

    public function forceDelete($question)
    {
        DB::transaction(function () use ($question) {

            $deleted = $question->forceDelete();
            throw_if(!$deleted, QueryException::class, 'No se pudo eliminar la pregunta');
            return $deleted;
        });
    }
}
