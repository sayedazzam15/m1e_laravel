<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Musician;
use App\Models\Song;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get albums for musician pherzog
        $albums = Album::orderByDesc('id')->simplePaginate(10);
        return view('album.index',compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $musicians = Musician::select('id','name')->get();
        return view('album.create',compact('musicians'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'cpr_date' => 'required|date_format:Y-m-d',
            'musician_id' => 'required|exists:musician,id'
        ]);
        Album::create($request->except('_token'));
        return redirect()->route('album.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        return view('album.show',compact('album'));
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
        //
    }
}
