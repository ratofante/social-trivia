<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        $user = Auth::user();

        return Inertia::render('Home/Home', [
            'permissions' => $user->getPermissions()
        ]);
    }
}
