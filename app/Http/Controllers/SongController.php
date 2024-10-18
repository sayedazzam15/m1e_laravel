<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Album;
use App\Models\Musician;
use App\Models\Song;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct() {
    }
    public function index()
    {
        // authentication
        // authentication packages
        // Auth  
        // dd(auth('admin')->user());

        // get song -> album -> musician

        //  cookie session authentication 
        // token


        $songs = Song::orderByDesc('id')->simplePaginate(10);
        // $songs->load('album');
        // $songs->each(fn($song) => $song->load('album'));
        
        return view('song.index',compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $albums = Album::select('id','title')->get();
        return view('song.create',compact('albums'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'album_id' => 'required|exists:albums,id'
        ]);
        Song::create($request->except('_token'));
        return redirect()->route('song.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $song = Song::find($id);
        $song->delete();
    }
}
