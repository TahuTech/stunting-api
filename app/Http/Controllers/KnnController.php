<?php

namespace App\Http\Controllers;

use App\Models\Knn;
use App\Models\temp;
use App\Models\Balita;
use Illuminate\Database\QueryException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\mysql_query;
use Symfony\Component\HttpFoundation\Response;

class KnnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Knn = Knn::orderBy('nama', 'ASC')->get();
        $response = [
            'message' => 'Daftar Status Balita',
            'data' => $Knn
        ];

        return response()->json($response, Response::HTTP_OK);
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
        $validator = Validator::make($request->all(), [
            'id_balita' => ['required', 'numeric'],
            'u' => ['required', 'numeric'],
            'bb' => ['required', 'numeric'],
            'tb' => ['required', 'numeric'],
            'lkkepala' => ['required', 'numeric'],
            'bulan' => ['required', 'numeric'],
            'gizi' => ['required', 'numeric'],
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
            $Knn = Knn::create($request->all());
            $response = [
                'message' => 'Data Knn Berhasil Di Simpan',
                'data' => $Knn
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
        $Knn = Knn::findOrFail($id);
        $response = [
            'message' => 'Detail data Knn',
            'data' => $Knn
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $Knn = Knn::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'id_balita' => ['required', 'numeric'],
            'u' => ['required', 'numeric'],
            'bb' => ['required', 'numeric'],
            'tb' => ['required', 'numeric'],
            'lkkepala' => ['required', 'numeric'],
            'bulan' => ['required', 'numeric'],
            'gizi' => ['required', 'numeric'],
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
            $Knn->update($request->all());
            $response = [
                'message' => 'Data KNN diupdate',
                'data' => $Knn
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Update Data KNN Gagal " . $e->errorInfo
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
        $Knn = Knn::findOrFail($id);

        try {
            $Knn->delete();
            $response = [
                'message' => 'Data Dihapus',
                'data' => $Knn
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Delete Data Gagal " . $e->errorInfo
            ]);
        }
    }

    public function hitungdataset()
    {
        $dataset = temp::count();
    }

    public function knn()
    {
        $dataset = temp::count();
        $k = 3;
    }

    public function lastdata()
    {
        $knn = Knn::orderBy('created_at', 'desc')->first();
        $u = [$knn => 'u'];
    }

    public function euclidian()
    {
        $dataset = temp::count();
        for ($i = 0; $i < $dataset; $i++) {
            #
        }
    }
}
