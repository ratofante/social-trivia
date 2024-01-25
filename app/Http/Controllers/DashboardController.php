<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;


class DashboardController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Dashboard', [
            'message' => 'Welcome to the dashboard',
            'isAdmin' => Auth::user()->hasRole('admin')
        ]);
    }
}
