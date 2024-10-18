<?php

namespace Database\Factories;

use App\Models\Musician;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'cpr_date' => fake()->date(),
            'musician_id' => Musician::inRandomOrder()->first() ?? Musician::factory()->create()
        ];
    }
}
