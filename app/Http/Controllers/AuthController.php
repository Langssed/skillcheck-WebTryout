<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function register(Request $request){
        
        $validate = $request->validate([
            'name' => 'required|min:3|max:32',
            'email' => 'required|email|unique:users,email',
            'school' => 'required|min:4|max:64',
            'password' => 'required|min:8|max:32|confirmed',
            'password_confirmation' => 'required'
        ], [
            'name.required' => 'Nama wajib diisi.',
            'name.min' => 'Nama minimal terdiri dari 3 karakter.',
            'name.max' => 'Nama maksimal terdiri dari 32 karakter.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',

            'school.required' => 'Nama sekolah wajib diisi.',
            'school.min' => 'Nama sekolah minimal 4 karakter.',
            'school.max' => 'Nama sekolah maksimal 64 karakter.',

            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal 8 karakter.',
            'password.max' => 'Kata sandi maksimal 32 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',

            'password_confirmation.required' => 'Konfirmasi kata sandi wajib diisi.',
        ]);

        $validate['password'] = Hash::make($validate['password']);

        $user = User::create($validate);

        $user->assignRole('user');

        return redirect('/login')->with('success', 'Successfully registered account');
    }

    public function login(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:32'
        ]);
        
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('failed', 'Wrong username or password')->withInput();

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function checkEmail(Request $request)
    {
        $emailExists = User::where('email', $request->email)->exists();

        return response()->json(['exists' => $emailExists]);
    }

    public function googleRedirect() {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback() {
        $socialUser = Socialite::driver('google')->user();

        $registeredUser = User::where('google_id', $socialUser->id)->first();

        if(!$registeredUser){
            $user = User::updateOrCreate([
                'google_id' => $socialUser->id,
            ], [
                'name' => $socialUser->name,
                'email' => $socialUser->email,
                'password' => Hash::make('password'),
                'google_token' => $socialUser->token,
                'google_refresh_token' => $socialUser->refreshToken,
            ]);

            Auth::login($user);

            $user->assignRole('user');
        
            return redirect('/');
        }

        Auth::login($registeredUser);
    
        return redirect('/');
    }
}
