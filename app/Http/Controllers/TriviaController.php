<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
use Inertia\Response;

/**
 * Creates a Trivia Simple game.
 * 5 random questions with a 5 minutes window before reset.
 */
class TriviaController extends Controller
{
    public function simple(): Response
    {
        $trivia = session('trivia_simple');
        $questions_qty = 3;

        if (!$trivia || Carbon::now()->diffInMinutes($trivia['created_at']) >= 5) {
            $questions = Question::inRandomOrder()->take($questions_qty)->get();
            Session::put('trivia_simple', [
                "questions" => $questions,
                "created_at" => Carbon::now()
            ]);
        }

        return Inertia::render('Trivia/TriviaSimple', [
            "trivia" => session('trivia_simple'),
            "nQuestions" => $questions_qty
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        return Redirect::route('trivia.results', [
            "answers" => $request['answers'],
            "trivia" => $request['trivia'],
            "score" => $request['score']
        ]);
    }

    public function results(Request $request): Response
    {
        $answers = $request['answers'];
        $trivia = $request['trivia'];
        $score = $request['score'];

        return Inertia::render('Trivia/TriviaResults', [
            "answers" => $answers,
            "trivia" => $trivia,
            "score" => $score
        ]);
    }

    public function social(): Response
    {
        return Inertia::render('Trivia/TriviaSocial');
    }
}
