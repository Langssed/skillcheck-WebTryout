<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class EnsureRoleIsSelected
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission): Response
    {
        $activeRole = session('active_role');
        
        if (!$activeRole) {
            return redirect()->route('choose.role');
        }
        
        if($activeRole != 'super admin'){
            $role = Role::where('name', $activeRole)->first();

            if (!$role || !$role->hasPermissionTo($permission)) {
                abort(403, 'Anda tidak memiliki akses ke halaman ini.');
            }
        }

        return $next($request);
    }
}
