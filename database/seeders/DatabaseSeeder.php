<?php

namespace Database\Seeders;

use App\Models\Supervisor;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        $this->call(MusicianSeeder::class);
        $this->call(AlbumSeeder::class);
        $this->call(SongSeeder::class);
        $this->call(MusicianPerformSongSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(SupervisorSeeder::class);
    }
}
