<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\MusicianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongController;
use App\Http\Middleware\CustomAuthMiddleware;
use App\Models\Album;
use App\Models\Musician;
use App\Models\Quiz;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $quiz = Quiz::find(1);
    return view('welcome');
});
Route::get('/hash', function () {
    return view('welcome');
});


// Route::middleware('m1e')->group(function(){
// ->middleware(['auth:supervisor,admin']);
    Route::get('/musicians',[MusicianController::class,'index'])->name('musician.index');
    Route::get('/musicians/create',[MusicianController::class,'create'])->name('musician.create');
    Route::get('/musicians/{musician:id}',[MusicianController::class,'show'])->name('musician.show');
    
    Route::post('/musicians',[MusicianController::class,'store'])->name('musician.store');
    
    Route::get('/musicians/edit/{musician:slug}',[MusicianController::class,'edit'])->name('musician.edit');
    
    Route::put('/musicians/edit/{musician:slug}',[MusicianController::class,'update'])->name('musician.update');
    
    Route::delete('/musicians/{musician:slug}',[MusicianController::class,'destroy'])->name('musician.destroy');
// });





Route::get('/album',[AlbumController::class,'index'])->name('album.index')->middleware(['auth:supervisor,admin','can:viewAny,'.Album::class]);
Route::get('/album/create',[AlbumController::class,'create'])->name('album.create');
Route::post('/album/create',[AlbumController::class,'store'])->name('album.store');

Route::get('/album/{album:id}',[AlbumController::class,'show'])->name('album.show');


Route::get('/song',[SongController::class,'index'])->name('song.index');

Route::get('/song/create',[SongController::class,'create'])->name('song.create');
Route::post('/song/create',[SongController::class,'store'])->name('song.store');






Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
