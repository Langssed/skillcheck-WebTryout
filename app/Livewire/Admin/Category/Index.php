<?php

namespace App\Livewire\Admin\Category;

use App\Models\Subject;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Index extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = "10";
    public $search = "";

    public $subject_id, $name, $slug, $category_id;

    public function render()
    {
        $data = array(
            'title' => 'Data Kategori Soal',
            'subjects' => Subject::all(),
            'categories' => Category::filter($this->search)->orderBy('subject_id', 'desc')->paginate($this->paginate)
        );
        return view('livewire.admin.category.index', $data);
    }

    public function resetSearch(){
        $this->search = '';
    }

    public function create(){
        $this->resetValidation();
        $this->reset([
            'name'
        ]);
    }

    public function store(){
        $validate = $this->validate([
            'subject_id' => 'required',
            'name' => 'required|min:2|max:16',
            'slug' => 'required|min:2|max:16|unique:categories,slug'
        ],[
            'subject.required' => 'Tingkat tidak boleh kosong',
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama tidak boleh kurang dari 2 karakter',
            'name.max' => 'Nama tidak boleh lebih dari 16 karakter',
            'slug.required' => 'Slug tidak boleh kosong',
            'slug.min' => 'Slug tidak boleh kurang dari 2 karakter',
            'slug.max' => 'Slug tidak boleh lebih dari 16 karakter',
            'slug.unique' => 'Slug sudah ada',
        ]);

        Category::create($validate);

        $this->dispatch('closeCreateModal');
    }

    public function edit($id){
        $this->resetValidation();
        $category = Category::findOrFail($id);
        
        $this->subject_id = $category->subject_id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->category_id = $category->id;
    }

    public function update($id){
        $validate = $this->validate([
            'subject_id' => 'required',
            'name' => 'required|min:2|max:16',
            'slug' => 'required|min:2|max:16|unique:categories,slug,' . $id
        ],[
            'subject.required' => 'Tingkat tidak boleh kosong',
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama tidak boleh kurang dari 2 karakter',
            'name.max' => 'Nama tidak boleh lebih dari 16 karakter',
            'slug.required' => 'Slug tidak boleh kosong',
            'slug.min' => 'Slug tidak boleh kurang dari 2 karakter',
            'slug.max' => 'Slug tidak boleh lebih dari 16 karakter',
            'slug.unique' => 'Slug sudah ada',
        ]);

        $category = Category::findOrFail($id);

        $category->update($validate);

        $this->dispatch('closeEditModal');
    }

    public function confirm($id){
        $category = Category::findOrFail($id);

        $this->name = $category->name;
        $this->subject_id = Subject::findOrFail($category->subject_id)->name;
        $this->category_id = $category->id;
    }

    public function destroy($id){
        $category = Category::findOrFail($id);

        $category->delete();

        $this->dispatch('closeDeleteModal');
    }
}
