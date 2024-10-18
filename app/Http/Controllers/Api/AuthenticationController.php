<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    function login(LoginRequest $request){
        $user = User::where('email',$request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)) throw ValidationException::withMessages(['email' => 'invalid data']);
        $token = $user->createToken('web-token',['song.index']);
        return response()->json(['user' => $user,'token' => $token->plainTextToken]);
    }
    function profile(){
        return response()->json(['user' => Auth::user()]);
    }
}
