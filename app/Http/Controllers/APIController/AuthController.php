<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use App\Models\User;

class AuthController extends Controller
{
     // Function Login
    public function login(Request $request)
    {
    	if (Auth::attempt($request->only(['email','password']))) {
    		
    		$validator = Validator::make($request->all(),[
	            'email' => 'required|string|email|max:255|unique:users',
	            'password' => 'required|string|min:8'
	        ]);

    		$user = User::where('email', $request->email)->firstOrFail();

    		if (!$user) {
    			
    			$data = array(
	    			'status_code' => 404,
	    			'data' => 'Data email tidak ditemukan'
	    		);

    			return response()->json($data, 404);
    		}

    		$token = $user->createToken('auth_token')->plainTextToken;

    		$data = array(
    			'status_code' => 200,
    			'token' => $token,
    			'token_type' => 'Bearer'
    		);

    		return response()->json($data, 200);
    	}
    }

    public function logout()
    {
    	auth()->user()->tokens()->delete();

    	$message = array(
    		'status_code' => 200,
    		'message' => 'Logout berhasil'
    	);

    	return response()->json($message, 200);
    }

    // Function Profile Detail
    public function me()
    {
    	$user = auth()->user();

    	$data = array( 
    		'authme' => array(
	    		'id_office' => $user->id_office,
	    		'photo' => $user->photo,
	    		'first_name' => $user->first_name,
	    		'last_name' => $user->last_name,
	    		'no_telp' => $user->no_telp,
	    		'email' => $user->email,
	    		'level' => $user->level,
	    		'status' => $user->status,
	    		'created_at' => $user->created_at
    		)
    	);

    	return response()->json($data, 200);
    }

}
