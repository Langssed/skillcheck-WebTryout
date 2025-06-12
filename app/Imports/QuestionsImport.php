<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuestionsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Question([
            'level_id'       => $row['level_id'],
            'subject_id'     => $row['subject_id'],
            'category_id'    => $row['category_id'],
            'content'        => $row['content'],
            'option_a'       => $row['option_a'],
            'option_b'       => $row['option_b'],
            'option_c'       => $row['option_c'],
            'option_d'       => $row['option_d'],
            'correct_answer' => $row['correct_answer'],
            'correct_answer' => strtoupper($row['correct_answer']),
        ]);
    }
}

