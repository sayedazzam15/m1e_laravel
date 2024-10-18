<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SongRequest;
use App\Http\Resources\SongResource;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    function index(){
        $songs = Song::simplePaginate();
        return response()->json(['data' => SongResource::collection($songs)]);
    }
    function show(Song $song){
        return response()->json(['data' => new SongResource($song)]);
    }
    function store(SongRequest $request){
        $song = Song::create($request->all());
        $song->addMedia($request->file('web'))->toMediaCollection('web-image');
        return response()->json(['data' => new SongResource($song)]);
    }
}
