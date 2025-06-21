<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Index extends Component
{
    public $name, $email, $school, $user_id, $password, $password_confirmation;
    protected $listeners = ['deleteAccount'];

    public function render()
    {
        $data = array(
            'title' => 'Profile'
        );
        return view('livewire.profile.index', $data);
    }

    public function updatePassword()
    {
        $user = User::where('id', Auth::user()->id);
        $this->validate([
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ],[
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password tidak boleh kurang dari 8 karakter',
            'password.confirmed' => 'Password tidak sama',
            'password_confirmation.required' => 'Konfirmasi Password tidak boleh kosong'
        ]);

        $user->update([
            'password' => Hash::make($this->password),
        ]);

        $this->reset(['password', 'password_confirmation']);
        $this->dispatch('changePasswordQuestions');
    }

    public function confirmDeleteAccount()
    {
        $this->dispatch('confirmDelete');
    }

    public function deleteAccount()
    {
        $user = User::findOrFail(Auth::id());

        Auth::logout();
        $user->delete();

        return redirect('/');
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
        return redirect('dashboard/profile');
    }
}