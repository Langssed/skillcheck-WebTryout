<?php

namespace App\Livewire\Superadmin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class Index extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = "10";
    public $search = "";

    public $roleSelected = [];
    public $name, $email, $school, $password, $password_confirmation, $user_id;

    public function render()
    {
        $data = array(
            'title' => 'Data User',
            'roles' => Role::all(),
            'users' => User::filter($this->search)->paginate($this->paginate)
        );
        return view('livewire.superadmin.user.index', $data);
    }

    public function resetSearch(){
        $this->search = "";
    }

    public function create(){
        $this->resetValidation();
        $this->reset([
            'name','email', 'school', 'password', 'password_confirmation'
        ]);
    }

    public function store(){
        $validate = $this->validate([
            'name' => 'required|min:4|max:32',
            'email' => 'required|email|unique:users',
            'school' => 'required|min:4|max:64',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ],[
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama tidak boleh kurang dari 4 karakter',
            'name.max' => 'Nama tidak boleh lebih dari 32 karakter',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'school.required' => 'Nama sekolah tidak boleh kosong',
            'school.min' => 'Nama sekolah tidak boleh kurang dari 4 karakter',
            'school.max' => 'Nama sekolah tidak boleh lebih dari 64 karakter',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password tidak boleh kurang dari 8 karakter',
            'password.confirmed' => 'Password tidak sama',
            'password_confirmation.required' => 'Konfirmasi Password tidak boleh kosong'
        ]);

        $validate['password'] = Hash::make($validate['password']);

        User::create($validate);

        $this->dispatch('closeCreateModal');
    }

    public function edit($id){
        $this->resetValidation();
        $user = User::findOrFail($id);

        $this->name = $user->name;
        $this->email = $user->email;
        $this->school = $user->school;
        $this->user_id = $user->id;
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function update($id){
        $validate = $this->validate([
            'name' => 'required|min:4|max:32',
            'email' => 'required|email|unique:users,email,' . $id,
            'school' => 'required|min:4|max:64',
            'password' => 'nullable|min:8|confirmed',
        ],[
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama tidak boleh kurang dari 4 karakter',
            'name.max' => 'Nama tidak boleh lebih dari 32 karakter',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'school.required' => 'Nama sekolah tidak boleh kosong',
            'school.min' => 'Nama sekolah tidak boleh kurang dari 4 karakter',
            'school.max' => 'Nama sekolah tidak boleh lebih dari 64 karakter',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password tidak boleh kurang dari 8 karakter',
            'password.confirmed' => 'Password tidak sama',
        ]);

        $user = User::findOrFail($id);
        
        if($validate['password']){
            $validate['password'] = Hash::make($validate['password']);
        }else{
            $validate['password'] = $user->password;
        }

        $user->update($validate);

        $this->dispatch('closeEditModal');
    }

    public function confirm($id)
    {
        $user = User::findOrFail($id);

        $this->name = $user->name;
        $this->email = $user->email;
        $this->school = $user->school;
        $this->user_id = $user->id;
    }

    public function destroy($id){
        $user = User::findOrFail($id);

        $user->delete();

        $this->dispatch('closeDeleteModal');
    }

    public function loadRoles($id){
        $user = User::findOrFail($id);
        
        $this->user_id = $user->id;
        $this->name = $user->name;

        $this->roleSelected = $user->roles->pluck('name')->toArray();
    }

    public function assignRole($id){
        $user = User::findOrFail($id);

        $this->validate([
            'roleSelected' => 'array|min:1',
        ], [
            'roleSelected.min' => 'Pilih minimal satu role.',
        ]);

        $user->syncRoles($this->roleSelected);

        $this->reset(['roleSelected']);

        $this->dispatch('closeRoleModal');
    }

}