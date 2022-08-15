<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use Illuminate\Database\QueryException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class BalitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balita = Balita::orderBy('nama', 'ASC')->get();
        $response = [
            'message' => 'Daftar balita di urutkan berdasarkan nama',
            'data' => $balita
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
            'idb' => ['required'],
            'nama' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        try {
            $balita = Balita::create($request->all());
            $response = [
                'message' => 'Data Balita Berhasil Di Simpan',
                'data' => $balita
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
        $balita = Balita::findOrFail($id);
        $response = [
            'message' => 'Detail data balita',
            'data' => $balita
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
        $balita = Balita::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'idb' => ['required'],
            'nama' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        try {
            $balita->update($request->all());
            $response = [
                'message' => 'Data Balita diupdate',
                'data' => $balita
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Update Data Gagal " . $e->errorInfo
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
        $balita = Balita::findOrFail($id);

        try {
            $balita->delete();
            $response = [
                'message' => 'Data Dihapus',
                'data' => $balita
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Delete Data Gagal " . $e->errorInfo
            ]);
        }
    }
}