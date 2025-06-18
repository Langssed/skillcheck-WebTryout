<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Level;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Subject;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(SuperAdminSeeder::class);

        User::factory(10)->create();
        Level::factory(3)->create();
        Subject::factory(30)->create();
        Category::factory(50)->create();
        Question::factory(150)->create();

    }
}
