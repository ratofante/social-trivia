<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TriviaController;
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
    Route::get('/home', [HomeController::class, 'index'])
        ->name('home');

    Route::get('/trivia/simple', [TriviaController::class, 'simple'])
        ->name('trivia.simple');
    Route::post('/trivia/simple', [TriviaController::class, 'store'])
        ->name('trivia.simple.store');

    Route::get('/trivia/results', [TriviaController::class, 'results'])
        ->name('trivia.results');

    Route::get('/trivia/social', [TriviaController::class, 'social'])
        ->name('trivia.social');
});

Route::group(['middleware' => 'auth'], function () {
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'role:admin',
        'as' => 'admin.',
    ], function () {
        Route::get(
            '/questions',
            [\App\Http\Controllers\Admin\QuestionController::class, 'index']
        )
            ->name('questions.index');
        Route::get('/questions/edit/{question}', [\App\Http\Controllers\Admin\QuestionController::class, 'edit'])
            ->where('question', '[0-9]+')
            ->name('questions.edit');
        Route::patch('/questions/{question}', [\App\Http\Controllers\Admin\QuestionController::class, 'update'])
            ->where('question', '[0-9]+')
            ->name('questions.update');
        Route::get('/questions/create', [\App\Http\Controllers\Admin\QuestionController::class, 'create'])
            ->name('questions.create');
        Route::post('/questions', [\App\Http\Controllers\Admin\QuestionController::class, 'store'])
            ->name('questions.store');
        Route::get('/questions/show/{question}', [\App\Http\Controllers\Admin\QuestionController::class, 'show'])
            ->where('question', '[0-9]+')
            ->name('questions.show');
        Route::delete('/questions/{question}', [\App\Http\Controllers\Admin\QuestionController::class, 'destroy'])
            ->where('question', '[0-9]+')
            ->name('questions.destroy');
    });

    Route::group([
        'prefix' => 'player',
        'middleware' => 'role:player',
        'as' => 'player.',
    ], function () {
        Route::get(
            '/questions',
            [\App\Http\Controllers\Player\QuestionController::class, 'index']
        )
            ->name('questions.index');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
