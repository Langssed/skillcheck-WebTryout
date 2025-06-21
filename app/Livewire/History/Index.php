<?php

namespace App\Livewire\History;

use App\Models\History;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public function render()
    {
        $data = array(
            'title' => 'Histort Pengerjaan',
            'histories' => History::with(['subject', 'level'])
                            ->where('user_id', Auth::user()->id)
                            ->latest()
                            ->get()
        );
        return view('livewire.history.index', $data);
    }
}

