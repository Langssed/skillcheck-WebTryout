<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'Dashboard Access']);
        Permission::create(['name' => 'Profile Access']);
        Permission::create(['name' => 'History Access']);
        Permission::create(['name' => 'Role Access']);
        Permission::create(['name' => 'Permission Access']);
        Permission::create(['name' => 'User Access']);
        Permission::create(['name' => 'Level Access']);
        Permission::create(['name' => 'Subject Access']);
        Permission::create(['name' => 'Category Access']);
        Permission::create(['name' => 'Question Access']);
    }
}
