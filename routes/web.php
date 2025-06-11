<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ChooseRoleController;

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout', [AuthController::class, 'logout']);

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


// Choose Role
Route::middleware('auth', 'has_role')->group(function () {
    Route::get('/choose-role', [ChooseRoleController::class, 'index'])->name('choose.role');
    Route::post('/choose-role', [ChooseRoleController::class, 'store'])->name('choose.role.store');
});


// Dashboard
Route::middleware(['auth', 'role_selected'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard.dashboard');
    })->middleware(['permission:Dashboard Access', 'role_selected'])
      ->name('dashboard');

    Route::view('dashboard/user', 'dashboard.user.index')
        ->middleware('permission:User Access')
        ->name('dashboard.user.index');

    Route::view('dashboard/role', 'dashboard.role.index')
        ->middleware('permission:Role Access')
        ->name('dashboard.role.index');

    Route::view('dashboard/permission', 'dashboard.permission.index')
        ->middleware('permission:Permission Access')
        ->name('dashboard.permission.index');

    Route::view('dashboard/level', 'dashboard.level.index')
        ->middleware('permission:Level Access')
        ->name('dashboard.level.index');

    Route::view('dashboard/subject', 'dashboard.subject.index')
        ->middleware('permission:Subject Access')
        ->name('dashboard.subject.index');

    Route::view('dashboard/category', 'dashboard.category.index')
        ->middleware('permission:Category Access')
        ->name('dashboard.category.index');

    Route::view('dashboard/question', 'dashboard.question.index')
        ->middleware('permission:Question Access')
        ->name('dashboard.question.index');
});