<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Question\UpdateQuestionRequest;
use App\Http\Requests\Question\StoreQuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use App\Repositories\QuestionRepository;
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
        $orderByTime = $request->query('time') === 'oldest' ? 'created_at asc' : 'created_at desc';
        $orderByScore = $request->query('score') === 'best' ? 'score desc' : 'score asc';

        $questions = Question::query()
            ->with('user', 'category')
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
        return Inertia::render('Dashboard/CreateQuestion');
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Requests\Question\StoreQuestionRequest
     * @return Illuminate\Http\RedirectResponse;
     */
    public function store(StoreQuestionRequest $request, QuestionRepository $repository): RedirectResponse
    {
        $repository->create($request);
        return Redirect::route('admin.questions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        $question = Question::where('id', $id)->firstOrFail();
        return Inertia::render('Welcome', [
            "question" => $question
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = Question::with('category')->find($id);

        return Inertia::render('Dashboard/EditQuestion', [
            'question' => $question
        ]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Requests\Question\UpdateQuestionRequest
     * @param \App\Modesl\Question
     * @return RedirectResponse
     */
    public function update(UpdateQuestionRequest $request, Question $question): RedirectResponse
    {
        $question->update($request->all());
        $question->save();
        return Redirect::route('admin.questions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question, QuestionRepository $repository): RedirectResponse
    {
        $repository->forceDelete($question);
        return Redirect::route('admin.questions.index', [
            "messages" => "La pregunta" . $question->question . "ha sido eliminada"
        ]);
    }
}
