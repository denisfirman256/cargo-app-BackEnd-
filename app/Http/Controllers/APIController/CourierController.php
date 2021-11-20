<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courier;
use App\Models\Transportation;
use App\Models\User;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Data Address Office

        $item = Courier::all();

        foreach ($item as $item) {
            $courier[] = [
                'id' => $item->id,
                'courier_name' => User::where('id', '=', $item->user_id)->first(),
                'transportation' => Transportation::where('id', '=', $item->transportation_id)->first(),
                'status' => $item->status,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at
            ];
        }

        if(empty($courier)){
            $message[] = [
                'status_code' => 404,
                'message' => 'Data tidak ada'
            ];

            return response()->json($message, 404);
        }

        $data[] = [
            'status_code' => 200,
            'data' => $courier
        ];

        return response()->json($data, 200);
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
        // Store Data 
        $validateCourier = User::where('id', '=', $request->user_id)->first()->level;

        if ($validateCourier != "courier") {

            $data[] = [
                'status_code' => 400,
                'message' => 'User ini bukan courier'
            ];

            return response()->json($data, 404);
        }
        

        $insertData = Courier::create($request->all());

        if (!$insertData) {
            $data[] = [
                'status_code' => 400,
                'message' => 'Data tidak berhasil di simpan'
            ];

            return response()->json($data, 404);
        }

        $data[] = [
            'status_code' => 200,
            'message' => 'Data berhasil dinput'
        ];

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find by ID

        $item = Courier::find($id);

        if (!$item) {
            
            $message = array(
                'status_code' => 404,
                'message' => 'Data tidak ada'
            );

            return response()->json($message, 404);
        }

        $message = array(
            'status_code' => 200,
            'data' => array(
                'id' => $item->id,
                'user_id' => User::where('id', '=', $item->user_id)->first(),
                'transportation_id' => Transportation::where('id', '=', $item->transportation_id)->first(),
                'status' => $item->status,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at
            )
        );

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
        // Edit by ID

        $item = Courier::find($id);

        if (!$item) {
            
            $message = array(
                'status_code' => 404,
                'message' => 'Data tidak ada'
            );

            return response()->json($message, 404);
        }

        $message = array(
            'status_code' => 200,
            'data' => array(
                'id' => $item->id,
                'user_id' => User::where('id', '=', $item->user_id)->first(),
                'transportation_id' => Transportation::where('id', '=', $item->transportation_id)->first(),
                'status' => $item->status,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at
            )
        );

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
        $item = Courier::find($id);

        if (!$item) {
            
            $message = array(
                'status_code' => 404,
                'message' => 'Data tidak ada'
            );

            return response()->json($message, 404);
        }

        $item->user_id = $request->user_id;
        $item->transportation_id = $request->transportation_id;
        $item->status = $request->status;
        $item->save();

        if (!$item->save()) {

            $message = array(
                'status_code' => 404,
                'message' => 'Data tidak dapat di perbaharui'
            );

            return response()->json($message, 404);
        }

        $message = array(
            'status_code' => 200,
            'data' => array(
                'id' => $item->id,
                'user_id' => User::where('id', '=', $item->user_id)->first(),
                'transportation_id' => Transportation::where('id', '=', $item->transportation_id)->first(),
                'status' => $item->status,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at
            )
        );

        return response()->json($message, 200);
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

        $item = Courier::find($id);

        if (!$item) {
            
            $message = array(
                'status_code' => 404,
                'message' => 'Data tidak ada'
            );

            return response()->json($message, 404);
        }

        $delete = $item->delete();


        if (!$delete) {

            $message = array(
                'status_code' => 404,
                'message' => 'Data tidak dapat dihapus!'
            );

            return response()->json($message, 404);
        }

        $message = array(
            'status_code' => 200,
            'message' => 'Data berhasil dihapus!'
        );

        return response()->json($message, 200);
    }
}
