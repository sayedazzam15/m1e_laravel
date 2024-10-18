<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'questions' => [
                [
                    'description' => fake()->sentence(),
                    'options' => [
                        'a' => '13',
                        'b' => '20',
                        'c' => '30',
                    ],
                    'correct_answer' => 'a'
                ],
                [
                    'description' => fake()->sentence(),
                    'options' => [
                        'a' => '13',
                        'b' => '20',
                        'c' => '30',
                    ],
                    'correct_answer' => 'b'
                ],
            ],
            'time_limit' => '60',
            'title' => fake()->sentence(),
            'topic' => 'frontend'
        ];
    }
}
