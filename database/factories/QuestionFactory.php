<?php

namespace Database\Factories;

use App\Models\Level;
use App\Models\Subject;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
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
            'Subject_id' => Subject::inRandomOrder()->first()->id,
            'Category_id' => Category::inRandomOrder()->first()->id,
            'content' => fake()->sentence(mt_rand(10, 20)),
            'option_a' => fake()->sentence(1),
            'option_b' => fake()->sentence(1),
            'option_c' => fake()->sentence(1),
            'option_d' => fake()->sentence(1),
            'correct_answer' => fake()->randomElement(['A', 'B', 'C', 'D'])
        ];
    }
}
