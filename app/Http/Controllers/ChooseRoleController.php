<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ChooseRoleController extends Controller
{
    public function index()
    {
        Session::forget('active_role');
        if(Auth::user()->roles->count() === 1){
            Session::put('active_role', Auth::user()->roles->first()->name);
            return redirect()->route('dashboard.profile');
        }
        $roles = Role::all();
        $hasRoles = Auth::user()->roles;
        return view('auth.chooseRole', compact('roles', 'hasRoles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);

        Session::put('active_role', $request->role);

        return redirect()->route('dashboard.profile');
    }
}
