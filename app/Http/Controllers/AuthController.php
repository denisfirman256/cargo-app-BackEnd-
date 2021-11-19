<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use App\Models\User;

class AuthController extends Controller
{
	// Function login
    public function login(Request $request)
    {

    	if (Auth::attempt($request->only(['email','password']))) {
    		
    		$validator = Validator::make($request->all(),[
	            'email' => 'required|string|email|max:255|unique:users',
	            'password' => 'required|string|min:8'
	        ]);

    		$user = User::where('email', $request->email)->firstOrFail();

    		if (!$user) {
    			
    			return redirect()->back()->with('error','Email tidak ditemukan!');

    		}

    		$token = $user->createToken('auth_token')->plainTextToken;

    		header('Authorization: '.$token);

    		return response()->json($data, 200);
    	}

    	return redirect()->back()->with('error', 'Email & Password tidak ditemukan!');
    }

    // Function logout
    public function logout()
    {
    	auth()->user()->tokens()->delete();

    	return redirect()->route('logout');
    }
}
