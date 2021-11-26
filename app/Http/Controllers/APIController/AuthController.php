<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use Auth;
use Validator;
use App\Models\User;    
use Ramsey\Uuid\Uuid;

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

        $message = [
            'status_code' => 422,
            'message' => 'Email & Password salah, silahkan cek kembali Email & Password anda!'
        ];

        return response()->json($message, 422);
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
	    		'office_id' => $user->office_id,
	    		'photo' => $user->photo,
	    		'first_name' => $user->first_name,
	    		'last_name' => $user->last_name,
	    		'no_telp' => $user->no_telp,
	    		'email' => $user->email,
	    		'level' => $user->level,
	    		'status' => $user->status,
	    		'created_at' => $user->created_at,
    		)
    	);

    	return response()->json($data, 200);
    }

    // Function Edit Profile
    public function editProfile(Request $request){

        $validator = Validator::make($request->all(),[
            'first_name' => 'required|min:2|max:50',
            'last_name' => 'required|min:2|max:50',
            'no_telp' => 'required|numeric',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            
            $error = $validator->errors()->all()[0];

            $message = [
                'status_code' => 422,
                'message' => $error,
                'data' => []
            ];

            return response()->json($message, 422);
        }

        $user = User::find($request->user()->id);

        if ($user == null) {

            $message = [
                'status_code' => 422,
                'message' => 'ID User tidak ditemukan!',
            ];

            return response()->json($message, 422);
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->no_telp = $request->no_telp;
        $user->email = $request->email;
        $user->update();

        $message = [
        'status_code' => 200,
        'message' => 'Perbarui profil berhasil!'
        ];

        return response()->json($message, 200);
        
    }

    // Function edit photo profile
    public function editPhotoProfile(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'photo' => 'required|image'
        ]);

        if ($validator->fails()) {
            
            $error = $validator->errors()->all()[0];

            $message = [
                'status_code' => 422,
                'message' => $error,
                'data' => []
            ];

            return response()->json($message, 422);
        }

        $user = User::find($request->user()->id);

        if ($user == null) {

            $message = [
                'status_code' => 422,
                'message' => 'ID User tidak ditemukan!',
            ];

            return response()->json($message, 422);
        }

        if ($request->photo && $request->photo->isValid()) {
            
            $file_name = Uuid::uuid4()->toString().'.'.$request->photo->extension();
            $request->photo->move(public_path('image_profile'), $file_name);
            $path = "/image_profile/{$file_name}";

            $user->photo = $path;
            $user->update();

            $message = [
            'status_code' => 200,
            'message' => 'Perbarui foto profil berhasil!'
            ];

            return response()->json($message, 200);
        }
        
        $message = [
        'status_code' => 422,
        'message' => 'Perbarui foto profil gagal!'
        ];

        return response()->json($message, 200);
    }

    // Function Edit Password
    public function editPassword(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password'
        ]);

        if ($validator->fails()) {
            
            $error = $validator->errors()->all()[0];

            $message = [
                'status_code' => 422,
                'message' => $error,
            ];

            return response()->json($message, 422);
        }

        $user = User::find($request->user()->id);

        if (!$user) {

            $message = [
                'status_code' => 404,
                'message' => 'ID User tidak ditemukan',
            ];

            return response()->json($message, 422);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        $message = [
                'status_code' => 200,
                'message' => 'Perbarui password user berhasil!',
            ];

            return response()->json($message, 200);

    }


}
