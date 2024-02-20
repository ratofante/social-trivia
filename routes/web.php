<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::group(['middleware' => 'auth'], function() {

    Route::group([
        'prefix' => 'admin',
        'middleware' => 'role:admin',
        'as' => 'admin.',
    ], function() {
        Route::get('/questions', 
        [\App\Http\Controllers\Admin\QuestionController::class, 'index'])
        ->name('questions.index');
    });

    Route::group([
        'prefix' => 'user',
        'middleware' => 'role:player',
        'as' => 'user.',
    ], function() {
        Route::get('/questions',
        [\App\Http\Controllers\Player\QuestionController::class, 'index'])
        ->name('questions.index');
    });
});


//  Route::middleware(['auth', 'verified'])->group(function() {
//     Route::get('/questions', [QuestionController::class, 'index'])
//         ->middleware('role:admin')
//         ->name('question.index');
//     Route::get('/questions/create', [QuestionController::class, 'create'])
//         ->name('question.create');
//  });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
