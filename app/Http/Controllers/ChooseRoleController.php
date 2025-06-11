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
        $roles = Role::all();
        $hasRoles = Auth::user()->roles;
        Session::forget('active_role');
        return view('auth.chooseRole', compact('roles', 'hasRoles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);

        Session::put('active_role', $request->role);

        if($request->role === 'admin'){
            return redirect()->route('dashboard.level.index');
        }

        if($request->role === 'teacher'){
            return redirect()->route('dashboard.question.index');
        }
        return redirect()->route('dashboard');
    }
}
