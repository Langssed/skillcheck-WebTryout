<?php

namespace App\Livewire\Superadmin\Level;

use App\Models\Level;
use Livewire\Component;

class Index extends Component
{
    public $name, $slug, $level_id;
    public function render()
    {
        $data = array(
            'title' => 'Data Tingkat',
            'levels' => Level::all()
        );
        return view('livewire.superadmin.level.index', $data);
    }

    public function create(){
        $this->resetValidation();
        $this->reset([
            'name'
        ]);
    }

    public function store(){
        $validate = $this->validate([
            'name' => 'required|min:2|max:16',
            'slug' => 'required|min:2|max:16|unique:levels,slug'
        ],[
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama tidak boleh kurang dari 2 karakter',
            'name.max' => 'Nama tidak boleh lebih dari 16 karakter',
            'slug.required' => 'Slug tidak boleh kosong',
            'slug.min' => 'Slug tidak boleh kurang dari 2 karakter',
            'slug.max' => 'Slug tidak boleh lebih dari 16 karakter',
            'slug.unique' => 'Slug sudah ada',
        ]);

        Level::create($validate);

        $this->dispatch('closeCreateModal');
    }

    public function edit($id){
        $this->resetValidation();
        $level = Level::findOrFail($id);

        $this->name = $level->name;
        $this->slug = $level->slug;
        $this->level_id = $level->id;
    }

    public function update($id){
        $validate = $this->validate([
            'name' => 'required|min:2|max:32',
            'slug' => 'required|min:2|max:16|unique:levels,slug,' . $id
        ],[
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama tidak boleh kurang dari 2 karakter',
            'name.max' => 'Nama tidak boleh lebih dari 16 karakter',
            'slug.required' => 'Slug tidak boleh kosong',
            'slug.min' => 'Slug tidak boleh kurang dari 2 karakter',
            'slug.max' => 'Slug tidak boleh lebih dari 16 karakter',
            'slug.unique' => 'Slug sudah ada',
        ]);

        $level = Level::findOrFail($id);

        $level->update($validate);

        $this->dispatch('closeEditModal');
    }

    public function confirm($id){
        $level = Level::findOrFail($id);

        $this->name = $level->name;
        $this->level_id = $level->id;
    }

    public function destroy($id){
        $level = Level::findOrFail($id);

        $level->delete();

        $this->dispatch('closeDeleteModal');
    }
}