<?php

namespace App\Livewire\Subject;

use App\Models\Level;
use App\Models\Subject;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = "10";
    public $search = "";

    public $level_id, $name, $slug, $subject_id, $time;
    public function render()
    {
        $data = array(
            'title' => 'Data Mapel',
            'levels' => Level::all(),
            'subjects' => Subject::filter($this->search)->orderBy('level_id','desc')->paginate($this->paginate)
        );
        return view('livewire.subject.index', $data);
    }

    public function resetSearch(){
        $this->search = '';
    }

    public function create(){
        $this->resetValidation();
        $this->reset([
            'level_id','name', 'slug', 'time'
        ]);
    }

    public function store(){
        $validate = $this->validate([
            'level_id' => 'required',
            'name' => 'required|min:2|max:32',
            'slug' => 'required|min:2|max:32|unique:subjects,slug',
            'time' => 'required|integer|min:1|max:300'
        ], [
            'level_id.required' => 'Tingkat tidak boleh kosong',

            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama tidak boleh kurang dari 2 karakter',
            'name.max' => 'Nama tidak boleh lebih dari 32 karakter',

            'slug.required' => 'Slug tidak boleh kosong',
            'slug.min' => 'Slug tidak boleh kurang dari 2 karakter',
            'slug.max' => 'Slug tidak boleh lebih dari 32 karakter',
            'slug.unique' => 'Slug sudah ada',

            'time.required' => 'Waktu tidak boleh kosong',
            'time.integer' => 'Waktu harus berupa angka',
            'time.min' => 'Waktu minimal 1 menit',
            'time.max' => 'Waktu tidak boleh lebih dari 300 menit',
        ]);

        Subject::create($validate);

        $this->dispatch('closeCreateModal');
    }

    public function edit($id){
        $this->resetValidation();
        $subject = Subject::findOrFail($id);
        
        $this->level_id = $subject->level_id;
        $this->name = $subject->name;
        $this->slug = $subject->slug;
        $this->time = $subject->time;
        $this->subject_id = $subject->id;
    }

    public function update($id){
        $validate = $this->validate([
            'level_id' => 'required',
            'name' => 'required|min:2|max:32',
            'slug' => 'required|min:2|max:32|unique:subjects,slug,' . $id,
            'time' => 'required|integer|min:1|max:300'
        ], [
            'level_id.required' => 'Tingkat tidak boleh kosong',

            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama tidak boleh kurang dari 2 karakter',
            'name.max' => 'Nama tidak boleh lebih dari 32 karakter',

            'slug.required' => 'Slug tidak boleh kosong',
            'slug.min' => 'Slug tidak boleh kurang dari 2 karakter',
            'slug.max' => 'Slug tidak boleh lebih dari 32 karakter',
            'slug.unique' => 'Slug sudah ada',

            'time.required' => 'Waktu tidak boleh kosong',
            'time.integer' => 'Waktu harus berupa angka',
            'time.min' => 'Waktu minimal 1 menit',
            'time.max' => 'Waktu tidak boleh lebih dari 300 menit',
        ]);

        $subject = Subject::findOrFail($id);

        $subject->update($validate);

        $this->dispatch('closeEditModal');
    }

    public function confirm($id){
        $subject = Subject::findOrFail($id);

        $this->name = $subject->name;
        $this->level_id = Level::findOrFail($subject->level_id)->name;
        $this->subject_id = $subject->id;
    }

    public function destroy($id){
        $subject = Subject::findOrFail($id);

        $subject->delete();

        $this->dispatch('closeDeleteModal');
    }
}
