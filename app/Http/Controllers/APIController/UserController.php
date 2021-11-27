<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Data User 

        $result = User::paginate(10);

        if (!$result) {
            
            $message = [
                'status_code' => 404,
                'message' => 'Data User tidak ada!'
            ];

            return response()->json($message, 404);
        }

        return response()->json($result, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Store Data Users
        $validator = Validator::make($request->all(),[
            'office_id' => 'required|numeric|max:5',
            'photo' => 'required|image',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'gender' => 'required|string',
            'no_telp' => 'required|numeric|min:10|max:10000000000000',
            'email' => 'required|email|string|max:255',
            'level' => 'required|string',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            
            $error = $validator->errors()->all()[0];

            $message = [
                'status_code' => 422,
                'message' => $error
            ];

            return response()->json($message, 422);
        }


        if ($request->photo && $request->photo->isValid()) {
            
            $file_name = Uuid::uuid4()->toString().'.'.$request->photo->extension();
            $request->photo->move(public_path('image_profile'), $file_name);
            $path = "/image_profile/{$file_name}";

            $user = User::create([
                'id' => Uuid::uuid4()->toString(),
                'office_id' => $request->office_id,
                'photo' => $path,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'gender' => $request->gender,
                'no_telp' => $request->no_telp,
                'email' => $request->email,
                'level' => $request->level,
                'password' => bcrypt($request->password)
            ]);

            if (!$user) {
                
                $message = [
                    'status_code' => 422,
                    'message' => 'Input data user gagal!'
                ];

                return response()->json($message, 422);
            }
            else {

                $message = [
                    'status_code' => 200,
                    'message' => 'Input data user berhasil!',
                    'data' => $user
                ];

                return response()->json($message, 200);
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find User by ID

        $user = User::find($id);

        if (!$user) {
            
            $message = [
                'status_code' => 404,
                'message' => 'Data user tidak ada!'
            ];

            return response()->json($message, 404);
        }

        $message = [
            'status_code' => 200,
            'office_id' => $user->office_id,
            'photo' => $user->photo,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'gender' => $user->gender,
            'no_telp' => $user->no_telp,
            'email' => $user->email,
            'level' => $user->level,
            'status' => $user->status,
        ];

        return response()->json($message, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Edit User by ID

        $user = User::find($id);

        if (!$user) {
            
            $message = [
                'status_code' => 404,
                'message' => 'Data user tidak ada!'
            ];

            return response()->json($message, 404);
        }

        $message = [
            'status_code' => 200,
            'office_id' => $user->office_id,
            'photo' => $user->photo,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'gender' => $user->gender,
            'no_telp' => $user->no_telp,
            'email' => $user->email,
            'level' => $user->level,
            'status' => $user->status,
        ];

        return response()->json($message, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Update Data User by ID

        $user = User::find($id);

        if ($user == null) {
            
            $message = [
                'status_codes' => 404,
                'message' => 'Data user tidak ditemukan!'
            ];

            return response()->json($message, 404);

        }

        $validator = Validator::make($request->all(),[
            'office_id' => 'required|numeric|max:5',
            'photo' => 'required|image',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'gender' => 'required|string',
            'no_telp' => 'required|numeric|min:10|max:10000000000000',
            'email' => 'required|email|string|max:255',
            'level' => 'required|string'
        ]);

        if ($validator->fails()) {
            
            $error = $validator->errors()->all()[0];

            $message = [
                'status_code' => 422,
                'message' => $error
            ];

            return response()->json($message, 422);
        }

        if ($request->photo && $request->photo->isvalid()) {
            
            $file_name = Uuid::uuid4()->toString().'.'.$request->photo->extension();
            $request->photo->move(public_path('image_profile'), $file_name);
            $path = "/image_profile/{$file_name}";

            $user->office_id = $request->office_id;
            $user->photo = $request->photo;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->gender = $request->gender;
            $user->no_telp = $request->no_telp;
            $user->email = $request->email;
            $user->level = $request->level;
            $user->update();

            $message = [
                'status_code' => 200,
                'message' => 'Perbarui data user berhasil!'
            ];

            return response()->json($message, 200);

        }

        $message = [
            'status_code' => 422,
            'message' => 'Perbarui data user gagal!'
        ];

        return response()->json($message, 422);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete by ID

        $user = User::find($id);

        if ($user == null) {
            
            $message = [
                'status_code' => 404,
                'message' => 'Data user berdasarkan ID tidak ada'
            ];

            return response()->json($message, 404);
        }

        $delete = $user->delete();

        if (!$delete) {
            
            $message = [
                'status_code' => 422,
                'message' => 'Data tidak dapat dihapus!'
            ];

            return response()->json($message, 422);
        }

        $message = [
            'status_code' => 200,
            'message' => 'Data berhasil dihapus!'
        ];

        return response()->json($message, 200);
    }
}
