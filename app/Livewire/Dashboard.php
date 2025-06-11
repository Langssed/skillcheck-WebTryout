<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Level;
use App\Models\Subject;
use Livewire\Component;
use App\Models\Category;
use App\Models\Question;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard', [
            'level' => Level::count(),
            'subject' => Subject::count(),
            'category' => Category::count(),
            'question' => Question::count(),
            'superAdmin' => User::role('super admin')->count(),
            'admin' => User::role('admin')->count(),
            // 'teacher' => User::role('teacher')->count(),
            'noRole' => User::doesntHave('roles')->count(),
        ]);
    }
}
