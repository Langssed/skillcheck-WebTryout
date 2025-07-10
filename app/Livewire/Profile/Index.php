<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithFileUploads;
    public $name, $email, $school, $user_id, $password, $password_confirmation, $profile_photo, $existing_profile_photo;
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

    public function edit($id)
    {
        $this->resetValidation(); // Reset pesan error validasi
        $this->reset(['profile_photo']); // Reset upload file sebelumnya (Livewire)

        $user = User::findOrFail($id);

        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->school = $user->school;

        // Kosongkan field password
        $this->password = '';
        $this->password_confirmation = '';

        // Jika kamu ingin tampilkan preview gambar lama (tidak lewat Livewire upload)
        $this->existing_profile_photo = $user->profile_photo ?? null;
    }

    public function update($id)
    {
        $validate = $this->validate([
            'name' => 'required|min:4|max:32',
            'email' => 'required|email|unique:users,email,' . $id,
            'school' => 'required|min:4|max:64',
            'password' => 'nullable|min:8|confirmed',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama tidak boleh kurang dari 4 karakter',
            'name.max' => 'Nama tidak boleh lebih dari 32 karakter',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'school.required' => 'Nama sekolah tidak boleh kosong',
            'school.min' => 'Nama sekolah tidak boleh kurang dari 4 karakter',
            'school.max' => 'Nama sekolah tidak boleh lebih dari 64 karakter',
            'password.min' => 'Password tidak boleh kurang dari 8 karakter',
            'password.confirmed' => 'Password tidak sama',
            'profile_photo.image' => 'File harus berupa gambar',
            'profile_photo.max' => 'Ukuran foto maksimal 2MB',
            'profile_photo.mimes' => 'Format gambar harus jpg, jpeg, png, atau webp',
        ]);

        $user = User::findOrFail($id);

        // Update password jika diisi
        if (!empty($validate['password'])) {
            $validate['password'] = Hash::make($validate['password']);
        } else {
            unset($validate['password']);
        }

        // Proses upload foto jika ada
        if (isset($validate['profile_photo'])) {
            // Hapus foto lama jika ada
            if ($user->profile_photo && Storage::disk('public')->exists($user->profile_photo)) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            // Simpan foto baru
            $path = $validate['profile_photo']->store('profile_photos', 'public');
            $validate['profile_photo'] = $path;
        } else {
            unset($validate['profile_photo']);
        }

        // Simpan update data
        $user->update($validate);

        // Reset file upload di Livewire
        $this->reset('profile_photo');

        // Tutup modal via Livewire event
        $this->dispatch('closeEditModal');

        // Redirect atau tampilkan notifikasi
        session()->flash('success', 'Profil berhasil diperbarui');
        return redirect('dashboard/profile');
    }

}