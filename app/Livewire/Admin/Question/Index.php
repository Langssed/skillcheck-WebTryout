<?php

namespace App\Livewire\Admin\Question;

use App\Models\Category;
use App\Models\Level;
use App\Models\Subject;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Question;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\QuestionsImport;

    
    class Index extends Component
    {
        use withPagination;
        protected $paginationTheme = 'bootstrap';
        public $paginate = "10";
        public $search = "";
        
        use WithFileUploads;
        public $file;

    public $level_id, $subject_id, $category_id , $content, $option_a, $option_b, $option_c, $option_d, $correct_answer, $question_id;
    public function render()
    {
        $data = array(
            'title' => 'Data Soal',
            'levels' => Level::all(),
            'subjects' => Subject::all(),
            'categories' => Category::all(),
            'questions' => Question::filter($this->search)->orderBy('level_id', 'desc')->paginate($this->paginate)
        );
        return view('livewire.admin.question.index', $data);
    }

    public function importQuestions()
    {
        $this->validate([
            'file' => 'required|file|mimes:xlsx,xls',
        ]);

        Excel::import(new QuestionsImport, $this->file->getRealPath());

        $this->reset('file');
        $this->dispatch('importQuestions');
    }

    public function resetSearch(){
        $this->search = '';
    }

    public function create(){
        $this->resetValidation();
        $this->reset([
            'level_id', 'subject_id', 'category_id','content', 'option_a', 'option_b', 'option_c', 'option_d', 'correct_answer'
        ]);
    }

    public function store(){
        $validate = $this->validate([
            'level_id' => 'required',
            'subject_id' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'correct_answer' => 'required',
        ],[
            'level_id.required' => 'Tingkat tidak boleh kosong',
            'subject_id.required' => 'Mapel tidak boleh kosong',
            'category_id.required' => 'Kategori tidak boleh kosong',
            'content.required' => 'Soal tidak boleh kosong',
            'option_a.required' => 'Pilihan A tidak boleh kosong',
            'option_b.required' => 'Pilihan B tidak boleh kosong',
            'option_c.required' => 'Pilihan C tidak boleh kosong',
            'option_d.required' => 'Pilihan D tidak boleh kosong',
            'correct_answer.required' => 'Jawaban tidak boleh kosong'
        ]);

        Question::create($validate);

        $this->dispatch('closeCreateModal');
    }

    public function edit($id){
        $this->resetValidation();
        $question = Question::findOrFail($id);
        
        $this->level_id = $question->level_id;
        $this->subject_id = $question->subject_id;
        $this->category_id = $question->category_id;
        $this->content = $question->content;
        $this->option_a = $question->option_a;
        $this->option_b = $question->option_b;
        $this->option_c = $question->option_c;
        $this->option_d = $question->option_d;
        $this->correct_answer = $question->correct_answer;
        $this->question_id = $question->id;
    }

    public function update($id){
        $validate = $this->validate([
            'level_id' => 'required',
            'subject_id' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'correct_answer' => 'required',
        ],[
            'level_id.required' => 'Tingkat tidak boleh kosong',
            'subject_id.required' => 'Mapel tidak boleh kosong',
            'category_id.required' => 'Kategori tidak boleh kosong',
            'content.required' => 'Soal tidak boleh kosong',
            'option_a.required' => 'Pilihan A tidak boleh kosong',
            'option_b.required' => 'Pilihan B tidak boleh kosong',
            'option_c.required' => 'Pilihan C tidak boleh kosong',
            'option_d.required' => 'Pilihan D tidak boleh kosong',
            'correct_answer.required' => 'Jawaban tidak boleh kosong'
        ]);

        $question = Question::findOrFail($id);

        $question->update($validate);

        $this->dispatch('closeEditModal');
    }

    public function confirm($id){
        $question = Question::findOrFail($id);

        $this->level_id = Level::findOrFail($question->level_id)->name;
        $this->subject_id = Subject::findOrFail($question->subject_id)->name;
        $this->category_id = category::findOrFail($question->category_id)->name;
        $this->content = $question->content;
        $this->question_id = $question->id;
    }

    public function destroy($id){
        $question = Question::findOrFail($id);

        $question->delete();

        $this->dispatch('closeDeleteModal');
    }

    public function show($id){
        $question = Question::findOrFail($id);

        $this->level_id = Level::findOrFail($question->level_id)->name;
        $this->subject_id = Subject::findOrFail($question->subject_id)->name;
        $this->category_id = category::findOrFail($question->category_id)->name;
        $this->content = $question->content;
        $this->option_a = $question->option_a;
        $this->option_b = $question->option_b;
        $this->option_c = $question->option_c;
        $this->option_d = $question->option_d;
        $this->correct_answer = $question->correct_answer;
    }
}
