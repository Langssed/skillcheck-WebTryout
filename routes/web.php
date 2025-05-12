<?php

use App\Http\Controllers\LevelController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;


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