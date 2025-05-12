<?php

namespace Database\Factories;

use App\Models\Level;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'level_id' => Level::inRandomOrder()->first()->id,
            'name' => fake()->unique()->sentence(1),
            'slug' => Str::slug(fake()->unique()->words(2, true))
        ];
    }
}
