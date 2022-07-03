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
            'message' => 'Dataset dari yang terkecil',
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
            'u' => ['required', 'numeric'],
            'bb' => ['required', 'numeric'],
            'tb' => ['required', 'numeric'],
            'lkkepala' => ['required', 'numeric'],
            'jarak' => [''],
            'gizi' => ['required', 'numeric'],
            'berat' => ['required', 'numeric'],
            'tinggi' => ['required', 'numeric'],
            'stunting' => ['required', 'numeric']
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
                'message' => 'Dataset Berhasil Di Simpan',
                'data' => $dataset
            ];

            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Data Gagal" . $e->errorInfo
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
            'message' => 'Detail Dataset',
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
            'u' => ['required', 'numeric'],
            'bb' => ['required', 'numeric'],
            'tb' => ['required', 'numeric'],
            'lkkepala' => ['required', 'numeric'],
            'jarak' => [''],
            'gizi' => ['required', 'numeric'],
            'berat' => ['required', 'numeric'],
            'tinggi' => ['required', 'numeric'],
            'stunting' => ['required', 'numeric']
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
                'message' => 'Dataset diupdate',
                'data' => $dataset
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Update Dataset Gagal " . $e->errorInfo
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
                'message' => 'Dataset Dihapus',
                'data' => $dataset
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Delete Dataset Gagal " . $e->errorInfo
            ]);
        }
    }
}
