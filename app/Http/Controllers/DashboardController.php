<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;


class DashboardController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Dashboard/General', [
            "user" => ["isAdmin" => Auth::user()->hasRole('admin')]
        ]);
    }

    public function users(): Response
    {
        return Inertia::render('Dashboard/Users', [
            "user" => ["isAdmin" => Auth::user()->hasRole('admin')],
            "users" => User::all()
        ]);
    }

    public function questions(): Response
    {
        $user = Auth::user();
        $userQuestions = $user->questions;

        return Inertia::render('Dashboard/Questions', [
            "user" => ["isAdmin" => Auth::user()->hasRole('admin')],
            "questions" => $userQuestions
        ]);
    }
}
