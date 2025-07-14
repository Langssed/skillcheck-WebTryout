<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Subject;
use App\Models\Question;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(Level $level, Subject $subject){
        
        $questions = Question::where('level_id', $level->id)
            ->where('subject_id', $subject->id)
            ->where('status', 'diterima')
            ->with(['level', 'category', 'subject'])
            ->get();

        $time = $subject->time;

        return view('questions.index', [
            'level' => $level,
            'subject' => $subject,
            'questions' => $questions,
            'time' => $time
        ]);
    }
}
