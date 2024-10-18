<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Song extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $fillable =[
        'title',
        'author',
        'album_id',
    ];
  
    function album(){
        return $this->belongsTo(Album::class);
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('web-image');
        $this->addMediaCollection('mobile-image');
        $this->addMediaCollection('seo-image');
        $this->addMediaCollection('video');
    }

    public function getAllMediaUrl($collection_name){
        $media = $this->getMedia($collection_name);
        return $media->map(fn($image) => ['url' => $image['original_url']]);
    }
}
