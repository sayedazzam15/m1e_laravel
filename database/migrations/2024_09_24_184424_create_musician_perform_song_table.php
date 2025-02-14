<?php

use App\Models\Musician;
use App\Models\Song;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('musician_perform_song', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Musician::class)->constrained('musician');
            $table->foreignIdFor(Song::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musician_perform_song');
    }
};
