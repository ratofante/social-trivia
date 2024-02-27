<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return QuestionCollection
     */
    public function index(Request $request): Response
    {
        $orderByTime = $request->query('time') === 'recent' ? 'created_at desc' : 'created_at asc';
        $orderByScore = $request->query('score') === 'best' ? 'score desc' : 'score asc';

        $questions = Question::query()
            ->orderByRaw($orderByTime)
            ->orderByRaw($orderByScore)
            ->paginate(20);

        $filters = [
            "time" => $request->query('time') === 'recent' ? true : false,
            "score" => $request->query('score') === 'best' ? true : false
        ];

        return Inertia::render('Dashboard/Questions', [
            'questions' => QuestionResource::collection($questions),
            'filters' => $filters
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = Question::find($id);

        return Inertia::render('Dashboard/EditQuestion', [
            'question' => $question
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $question = Question::findOrFail($id);
        $question->update($request->all());
        $question->save();
        return Redirect::route('admin.questions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Returns questions based on the applied filters
     * @return QuestionCollection
     */
    public function filter(Request $request): Response
    {
        dd($request->mostRecent);
        $questions = null;

        Inertia::render('Dashboard/Questions', [
            'questions' => $questions
        ]);
    }
}
