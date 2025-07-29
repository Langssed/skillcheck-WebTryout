<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ChooseRoleController;
use App\Http\Controllers\HistoryController;

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/check-email', [AuthController::class, 'checkEmail']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout', [AuthController::class, 'logout']);
Route::get('/auth/redirect', [AuthController::class, 'googleRedirect']);
Route::get('/auth/google/callback', [AuthController::class, 'googleCallback']);

Route::get('/login', function () {
    return view('pages.login');
});

Route::get('/register', function () {
    return view('pages.register');
});

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/question-lists', [LevelController::class, 'index']);

Route::get('/question/{level:slug}/{subject:slug}', [SubjectController::class, 'index']);

Route::post('/histories', [HistoryController::class, 'store']);


// Choose Role
Route::middleware('auth', 'has_role')->group(function () {
    Route::get('/choose-role', [ChooseRoleController::class, 'index'])->name('choose.role');
    Route::post('/choose-role', [ChooseRoleController::class, 'store'])->name('choose.role.store');
});

Route::get('/api/subjects/{level_id}', function ($level_id) {
    return \App\Models\Subject::where('level_id', $level_id)->get();
});

Route::get('/api/categories/{subject_id}', function ($subject_id) {
    return \App\Models\Category::where('subject_id', $subject_id)->get();
});


// Dashboard
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard.dashboard');
    })->middleware(['role_selected.permission:Dashboard Access'])
      ->name('dashboard');

    Route::view('dashboard/profile', 'dashboard.profile.index')
        ->middleware('role_selected.permission:Profile Access')
        ->name('dashboard.profile');

    Route::view('dashboard/history', 'dashboard.history.index')
        ->middleware('role_selected.permission:History Access')
        ->name('dashboard.history');

    Route::view('dashboard/user', 'dashboard.user.index')
        ->middleware('role_selected.permission:User Access')
        ->name('dashboard.user.index');

    Route::view('dashboard/role', 'dashboard.role.index')
        ->middleware('role_selected.permission:Role Access')
        ->name('dashboard.role.index');

    Route::view('dashboard/permission', 'dashboard.permission.index')
        ->middleware('role_selected.permission:Permission Access')
        ->name('dashboard.permission.index');

    Route::view('dashboard/level', 'dashboard.level.index')
        ->middleware('role_selected.permission:Level Access')
        ->name('dashboard.level.index');

    Route::view('dashboard/subject', 'dashboard.subject.index')
        ->middleware('role_selected.permission:Subject Access')
        ->name('dashboard.subject.index');

    Route::view('dashboard/category', 'dashboard.category.index')
        ->middleware('role_selected.permission:Category Access')
        ->name('dashboard.category.index');

    Route::view('dashboard/question', 'dashboard.question.index')
        ->middleware('role_selected.permission:Question Access')
        ->name('dashboard.question.index');
});