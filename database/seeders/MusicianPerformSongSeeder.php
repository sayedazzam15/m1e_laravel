<?php

namespace Database\Seeders;

use App\Models\MusicianPerformSong;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MusicianPerformSongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MusicianPerformSong::factory(50)->create();
    }
}
