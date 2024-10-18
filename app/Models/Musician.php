<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musician extends Model
{
    protected $table = 'musician';
    protected $fillable = ['name','city','street','phone','gender','date_of_birth','slug'];
    use HasFactory;
    // role  admin  supervisor
    // permission  1,2,3,4,5   6,7
    // create admin assignRole admin
    // create supervisor assignRole supervisor
    function songs(){
        return $this->belongsToMany(Song::class,'musician_perform_song');
    }
    function albums(){
        return $this->hasMany(Album::class);
    }
    function producedSongs(){
        return $this->hasManyThrough(Song::class,Album::class);
    }
}
