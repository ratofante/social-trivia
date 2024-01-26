<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;


class DashboardController extends Controller
{
    protected $userData;

    // public function __construct()
    // {
    //     $this->userData = [
    //         'user' => $this->getUserData(),
    //     ];
    // }

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
        // Fetch questions data
        return Inertia::render('Dashboard/Questions', [
            "user" => ["isAdmin" => Auth::user()->hasRole('admin')]
        ]);
    }

    // protected function getUserData()
    // {   
    //     return [
    //         'isAdmin' => Auth::user()->hasRole('admin'),
    //     ];
    // }
}
