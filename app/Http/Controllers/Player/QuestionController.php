<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response
    {
        $orderByTime = $request->query('time') === 'recent' ? 'created_at desc' : 'created_at asc';
        $orderByScore = $request->query('score') === 'best' ? 'score desc' : 'score asc';

        $player_questions = Question::query()
            ->whereHas('user', function ($query) use ($request) {
                $query->where('id', $request->user()->id);
            })
            ->with('user', 'category')
            ->orderByRaw($orderByTime)
            ->orderByRaw($orderByScore)
            ->paginate(20);

        $filters = [
            "time" => $request->query('time') === 'recent' ? true : false,
            "score" => $request->query('score') === 'best' ? true : false
        ];

        return Inertia::render('Dashboard/Questions', [
            "questions" => QuestionResource::collection($player_questions),
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
