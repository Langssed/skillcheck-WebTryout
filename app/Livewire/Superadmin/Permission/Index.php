<?php

namespace App\Livewire\Superadmin\Permission;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Index extends Component
{
    public $name, $permission_id;
    public function render()
    {
        $data = array(
            'title' => 'Data permission',
            'permissions' => Permission::all()
        );
        return view('livewire.superadmin.permission.index', $data);
    }

    public function create(){
        $this->resetValidation();
        $this->reset([
            'name'
        ]);
    }

    public function store(){
        $validate = $this->validate([
            'name' => 'required|min:4|max:32'
        ],[
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama tidak boleh kurang dari 4 karakter',
            'name.max' => 'Nama tidak boleh lebih dari 32 karakter',
        ]);

        Permission::create($validate);

        $this->dispatch('closeCreateModal');
    }

    public function edit($id){
        $this->resetValidation();
        $permission = Permission::findOrFail($id);

        $this->name = $permission->name;
        $this->permission_id = $permission->id;
    }

    public function update($id){
        $validate = $this->validate([
            'name' => 'required|min:4|max:32'
        ],[
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama tidak boleh kurang dari 4 karakter',
            'name.max' => 'Nama tidak boleh lebih dari 32 karakter',
        ]);

        $permission = Permission::findOrFail($id);

        $permission->update($validate);

        $this->dispatch('closeEditModal');
    }

    public function confirm($id){
        $permission = Permission::findOrFail($id);

        $this->name = $permission->name;
        $this->permission_id = $permission->id;
    }

    public function destroy($id){
        $permission = Permission::findOrFail($id);

        $permission->delete();

        $this->dispatch('closeDeleteModal');
    }
}