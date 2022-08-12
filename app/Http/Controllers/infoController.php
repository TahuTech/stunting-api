<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balita;
use Illuminate\Database\QueryException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class infoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balita = Balita::orderBy('nama', 'DESC')->get();
        $response = [
            'message' => 'Daftar balita di urutkan berdasarkan nama',
            'data' => $balita
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function balitanik()
    {
        $balita = Balita::orderBy('nik', 'DESC')->get();
        $response = [
            'message' => 'Daftar balita di urutkan berdasarkan nama',
            'data' => $balita
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function balitanikb()
    {
        $balita = Balita::orderBy('nik', 'ASC')->get();
        $response = [
            'message' => 'Daftar balita di urutkan berdasarkan nama',
            'data' => $balita
        ];

        return response()->json($response, Response::HTTP_OK);
    }
}
