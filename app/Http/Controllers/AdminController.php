<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AdminController extends Controller
{
    public function users(): Response
    {
        return Inertia::render('Admin/Users', [
            'users' => User::all()
        ]);
    }
}
