<?php

namespace App\Livewire\Superadmin\Role;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    public $permissionSelected = [];
    public $name, $role_id;
    public function render()
    {
        $data = array(
            'title' => 'Data Role',
            'roles' => Role::all(),
            'permissions' => Permission::all()
        );
        return view('livewire.superadmin.role.index', $data);
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

        Role::create($validate);

        $this->dispatch('closeCreateModal');
    }

    public function edit($id){
        $this->resetValidation();
        $role = Role::findOrFail($id);

        $this->name = $role->name;
        $this->role_id = $role->id;
    }

    public function update($id){
        $validate = $this->validate([
            'name' => 'required|min:4|max:32'
        ],[
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama tidak boleh kurang dari 4 karakter',
            'name.max' => 'Nama tidak boleh lebih dari 32 karakter',
        ]);

        $role = Role::findOrFail($id);

        $role->update($validate);

        $this->dispatch('closeEditModal');
    }

    public function confirm($id){
        $role = Role::findOrFail($id);

        $this->name = $role->name;
        $this->role_id = $role->id;
    }

    public function destroy($id){
        $role = Role::findOrFail($id);

        $role->delete();

        $this->dispatch('closeDeleteModal');
    }

    public function loadPermissions($id){
        $role = Role::findOrFail($id);
        
        $this->role_id = $role->id;
        $this->name = $role->name;

        $this->permissionSelected = $role->permissions->pluck('name')->toArray();
    }

    public function givePermission($id){
        $role = Role::findOrFail($id);

        $this->validate([
            'permissionSelected' => 'array|min:1',
        ], [
            'permissionSelected.min' => 'Pilih minimal satu permission.',
        ]);

        $role->syncPermissions($this->permissionSelected);

        $this->reset(['permissionSelected']);

        $this->dispatch('closePermissionModal');
    }
}