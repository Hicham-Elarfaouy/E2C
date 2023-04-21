<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::fallback(function () {
//    return view('home.404', [], [404]);
//});

Route::name('home.')->group(function(){
    Route::view('/', 'home.index')->name('index');
    Route::view('/contact', 'home.contact')->name('contact');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::name('dash.')->group(function(){
        Route::resource('users', UserController::class);

//        entity subject
        Route::resource('subjects', SubjectController::class)->except(['create', 'show']);
        Route::post('/subjects/export', [SubjectController::class, 'export'])->name('subjects.export');

//        entity classroom
        Route::resource('classrooms', ClassroomController::class)->except(['create', 'show']);
        Route::post('/classrooms/export', [ClassroomController::class, 'export'])->name('classrooms.export');

//        entity level
        Route::resource('levels', LevelController::class)->except(['create', 'show']);
        Route::post('/levels/export', [LevelController::class, 'export'])->name('levels.export');

//        entity attendance
        Route::resource('attendances', AttendanceController::class)->except(['create', 'show']);
        Route::post('/attendances/export', [AttendanceController::class, 'export'])->name('attendances.export');

//        entity revenue
        Route::resource('revenues', RevenueController::class)->except(['create', 'show']);
        Route::post('/revenues/export', [RevenueController::class, 'export'])->name('revenues.export');

//        entity expense
        Route::resource('expenses', ExpenseController::class)->except(['create', 'show']);
        Route::post('/expenses/export', [ExpenseController::class, 'export'])->name('expenses.export');

//        entity note
        Route::resource('notes', NoteController::class)->except(['create', 'show']);
        Route::post('/notes/export', [NoteController::class, 'export'])->name('notes.export');

//        entity result
        Route::resource('results', ResultController::class)->except(['create', 'show']);
        Route::post('/results/export', [ResultController::class, 'export'])->name('results.export');

//        entity request
        Route::resource('requests', RequestController::class)->except(['edit', 'update']);
        Route::post('/requests/solve/{request}', [RequestController::class, 'solve'])->name('requests.solve');
        Route::get('/requests/user/{user}', [RequestController::class, 'show_user'])->name('requests.user');
        Route::post('/requests/export', [RequestController::class, 'export'])->name('requests.export');
    });
});
