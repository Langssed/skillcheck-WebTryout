<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index(){

        $levels = Level::with('subjects')->get();

        return view('pages.questionLists', [
            'levels' => $levels,
        ]);
    }
}
