<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function store(Request $request){
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'level_id' => 'required|exists:levels,id',
            'subject_id' => 'required|exists:subjects,id',
            'score' => 'required|integer',
            'persentage_score' => 'required|numeric',
            'total_questions' => 'required|integer',
            'correct_answer' => 'required|integer',
        ]);

        $history = History::create($data);

        return response()->json(['message' => 'Berhasil disimpan', 'data' => $history]);
    }
}
