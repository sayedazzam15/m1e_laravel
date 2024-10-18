<?php

namespace App\Http\Controllers;

use App\Models\Musician;
use App\Models\MusicianPerformSong;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MusicianController extends Controller
{
    function index(){
        // admin
        // supervisor show musicians and he can create new musician
        // dd(Gate::allows('musician.index'));
        $musicians = Musician::orderByDesc('id')->simplePaginate(10);
        return view('musician.index',compact('musicians'));
    }

    function show(Musician $musician){
        return view('musician.show',compact('musician'));
    }
    function create(){
        $songs = Song::select('id','title')->get();
        return view('musician.create',compact('songs'));
    }
    function store(){
        request()->validate($this->getMusicianValidationRules());
        $musician = Musician::create([...request()->except('_token','songs_id'),'slug' => str()->slug(request()->name)]);
        $musician->songs()->attach(request()->songs_id);
        // $musician->songs()->detach([1,2]);
        // $musician->songs()->sync([1,2]);
        return redirect()->route('musician.index');
    }
    function edit(Musician $musician){
        return view('musician.edit',compact('musician'));
    }
    function update(Musician $musician){
        request()->validate($this->getMusicianValidationRules());
        $musician->update([...request()->except('_token'),'slug' => str()->slug(request()->name)]);
        // $musician->songs()->detach();
        // $musician->songs()->attach(request()->songs_id);
        // $musician->songs()->sync(request()->songs_id);
        // 9,10  attach 1,2   9,10,1,2
        // 9,10  sync 1,2   1,2
       
        return redirect()->route('musician.index');
    }
    function destroy(Musician $musician){
        $musician->delete();
        return redirect()->route('musician.index');
    }
    private function getMusicianValidationRules(){
        return [
            'name' => 'required|min:3',
            'city' => ['required','string'],
            'street' => 'required',
            'phone' => 'required',
            'date_of_birth' => 'required|date',
            'city' => 'required',
            'gender' => 'required|in:male,female',
            'songs_id' => 'required|array',
            'songs_id.*' => 'required|exists:songs,id'
        ];
    }
}

