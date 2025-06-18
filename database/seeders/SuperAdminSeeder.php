<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'super admin',
            'email' => 'superadmin@example.com',
            'school' => 'SMAS PIIS',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('super admin', 'admin', 'teacher', 'user');
    }
}
