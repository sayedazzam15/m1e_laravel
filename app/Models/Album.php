<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $fillable = ['title','cpr_date','musician_id'];
    function musician(){
        return $this->belongsTo(Musician::class);
    }
    function songs(){
        return $this->hasMany(Song::class);
    }
}




