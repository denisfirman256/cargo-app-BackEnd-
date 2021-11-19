<?php

namespace App\Http\Controllers\APIController\HeadOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryStuff;

class CategoryStuffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Data Category Stuff

        $result = CategoryStuff::all();

        if (!$result) {
            
            $message[] = [
                'status_code' => 404,
                'message' => 'Data kategori barang masih kosong'
            ];

            return response()->json($message, 404);
        }

        $data[] = [
            'status_code' => 200,
            'data' => $result
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
        // Store Data Address Office

        $insertData = CategoryStuff::create($request->all());

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

        $item = CategoryStuff::find($id);

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
                'name_category' => $item->name_category,
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

        $item = CategoryStuff::find($id);

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
                'name_category' => $item->name_office,
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
        $item = CategoryStuff::find($id);

        if (!$item) {
            
            $message = array(
                'status_code' => 404,
                'message' => 'Data tidak ada'
            );

            return response()->json($message, 404);
        }

        $item->name_category = $request->name_category;
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
                'name_category' => $item->name_category,
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

        $item = CategoryStuff::find($id);

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
