<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;


class DashboardController extends Controller
{
    public function index(Request $request): Response
    {
        $user = Auth::user();
        return Inertia::render('Dashboard/Dashboard', [
            "isAdmin" => $user->hasRole('admin'),
            "permissions" => $user->getPermissions(),
        ]);
    }
}
