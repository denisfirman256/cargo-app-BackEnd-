<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transportation;

class TransportationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Data Address Office

        $item = Transportation::all();

        $data[] = [
            'status_code' => 200,
            'data' => $item
        ];

        if(empty($data)){
            $message[] = [
                'status_code' => 404,
                'message' => 'Data alamat tidak ada'
            ];

            return response()->json($message, 404);
        }

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
        // Store Data Address Office

        $insertData = Transportation::create($request->all());

        if (!$insertData) {
            $data[] = [
                'status_code' => 400,
                'message' => 'Data tidak berhasil di simpan'
            ];
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

        $item = Transportation::find($id);

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
                'status' => $item->status,
                'transportation_type' => $item->transportation_type,
                'capacity' => $item->capacity,
                'unit_weight' => $item->unit_weight,
                'license_plate' => $item->license_plate,
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

        $item = Transportation::find($id);

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
                'status' => $item->status,
                'transportation_type' => $item->transportation_type,
                'capacity' => $item->capacity,
                'unit_weight' => $item->unit_weight,
                'license_plate' => $item->license_plate,
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
        $item = Transportation::find($id);

        if (!$item) {
            
            $message = array(
                'status_code' => 404,
                'message' => 'Data tidak ada'
            );

            return response()->json($message, 404);
        }

        $item->status = $request->status;
        $item->transportation_type = $request->transportation_type;
        $item->capacity = $request->capacity;
        $item->unit_weight = $request->unit_weight;
        $item->license_plate = $request->license_plate;
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
                'status' => $item->status,
                'transportation_type' => $item->transportation_type,
                'capacity' => $item->capacity,
                'unit_weight' => $item->unit_weight,
                'license_plate' => $item->license_plate,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at
            )
        );

        return response()->json($item, 200);
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

        $item = Transportation::find($id);

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
