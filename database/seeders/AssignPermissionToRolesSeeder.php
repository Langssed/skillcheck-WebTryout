<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AssignPermissionToRolesSeeder extends Seeder
{
    public function run()
    {
        // Assign ke role: admin
        $admin = Role::where('name', 'admin')->first();
        $adminPermissions = [
            'Dashboard Access',
            'Profile Access',
            'History Access',
            'Level Access',
            'Subject Access',
            'Category Access',
            'Question Access',
        ];
        $admin->syncPermissions($adminPermissions);

        // Assign ke role: teacher
        $teacher = Role::where('name', 'teacher')->first();
        $teacherPermissions = [
            'Profile Access',
            'History Access',
            'Level Access',
            'Subject Access',
            'Category Access',
            'Question Access',
        ];
        $teacher->syncPermissions($teacherPermissions);

        // Assign ke role: user
        $user = Role::where('name', 'user')->first();
        $userPermissions = [
            'Profile Access',
            'History Access',
        ];
        $user->syncPermissions($userPermissions);
    }
}