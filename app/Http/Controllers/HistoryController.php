<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class HistoryController extends Controller
{

    public function store(Request $request)
    {
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

        // Generate PDF Sertifikat
        $pdf = Pdf::loadView('certificates.template', [
            'history' => $history,
            'user' => $history->user,
            'subject' => $history->subject,
            'level' => $history->level,
        ])->setPaper('A4', 'landscape');

        // Simpan ke storage
        $filename = 'certificates/sertifikat-' . $history->id . '.pdf';
        Storage::disk('public')->put($filename, $pdf->output());

        // Update URL ke database
        $history->update([
            'certificate_url' => $filename,
        ]);

        return response()->json(['message' => 'Berhasil disimpan', 'data' => $history]);
    }
}
