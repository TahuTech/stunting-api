<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class DatasetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataset = Dataset::orderBy('jarak', 'ASC')->get();
        $response = [
            'message' => 'Dataset dari jarak yang terkecil',
            'data' => $dataset
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'du' => ['required', 'numeric'],
            'dbb' => ['required', 'numeric'],
            'dtb' => ['required', 'numeric'],
            'dlkkepala' => ['required', 'numeric'],
            'dgizi' => ['required', 'numeric'],
            'dtinggi' => ['required', 'numeric'],
            'dberat' => ['required', 'numeric'],
            'dstunting' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        try {
            $dataset = Dataset::create($request->all());
            $response = [
                'message' => 'Dataset Ditambahkan',
                'data' => $dataset
            ];

            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Dataset Gagal" . $e->errorInfo
            ]);
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
        $dataset = Dataset::findOrFail($id);
        $response = [
            'message' => 'Detail data dataset$dataset',
            'data' => $dataset
        ];

        return response()->json($response, Response::HTTP_OK);
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
        $dataset = Dataset::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'du' => ['required', 'numeric'],
            'dbb' => ['required', 'numeric'],
            'dtb' => ['required', 'numeric'],
            'dlkkepala' => ['required', 'numeric'],
            'jarak' => ['required', 'numeric'],
            'dgizi' => ['required', 'numeric'],
            'dtinggi' => ['required', 'numeric'],
            'dberat' => ['required', 'numeric'],
            'dstunting' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        try {
            $dataset->update($request->all());
            $response = [
                'message' => 'Dataset Diupdate',
                'data' => $dataset
            ];

            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Update Dataset Gagal" . $e->errorInfo
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataset = Dataset::findOrFail($id);

        try {
            $dataset->delete();
            $response = [
                'message' => 'Dataset Diupdate',
                'data' => $dataset
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Delete Dataset Gagal" . $e->errorInfo
            ]);
        }
    }
}
