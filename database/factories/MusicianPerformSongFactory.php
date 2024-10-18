<?php

namespace Database\Factories;

use App\Models\Musician;
use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MusicianPerformSongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'musician_id' => Musician::inRandomOrder()->first() ?? Musician::factory()->create(),
            'song_id' => Song::inRandomOrder()->first() ?? Song::factory()->create(),
        ];
    }
}
