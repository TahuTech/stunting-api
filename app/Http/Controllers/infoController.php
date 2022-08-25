<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balita;
use Illuminate\Database\QueryException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\DB;
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
        $allbalita = DB::table('balitas')->count();
        $stun = DB::table('balitas')->count();
        $norm = DB::table('balitas')->count();
        // dump($allbalita);
        // die;
        $response = [
            'message' => 'jumlah data balita terdaftar',
            'allbalita' => $allbalita,
            'stun' => $stun,
            'norm' => $norm,
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function balitanorm()
    {
        $norm = DB::select('SELECT * FROM knns join balitas on knns.id_balita = balitas.idb where stunting=2 ');
        $response = [
            'message' => 'Balita Normal',
            'data' => $norm
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function balitastun()
    {
        $stun = DB::select('SELECT * FROM knns join balitas on knns.id_balita = balitas.idb where stunting=1 ');
        $response = [
            'message' => 'Balita Stunting',
            'data' => $stun
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gizle()
    {
        $gizle = DB::select('SELECT * FROM knns join balitas on knns.id_balita = balitas.idb where gizi=1 ');
        $response = [
            'message' => 'Balita Gizi Lebih',
            'data' => $gizle
        ];

        return response()->json($response, Response::HTTP_OK);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gizba()
    {
        $gizba = DB::select('SELECT * FROM knns join balitas on knns.id_balita = balitas.idb where gizi=2 ');
        $response = [
            'message' => 'Balita Gizi Baik',
            'data' => $gizba
        ];

        return response()->json($response, Response::HTTP_OK);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gizku()
    {
        $gizku = DB::select('SELECT * FROM knns join balitas on knns.id_balita = balitas.idb where gizi=3 ');
        $response = [
            'message' => 'Balita Gizi Kurang',
            'data' => $gizku
        ];

        return response()->json($response, Response::HTTP_OK);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gizbu()
    {
        $gizbu = DB::select('SELECT * FROM knns join balitas on knns.id_balita = balitas.idb where gizi=1 ');
        $response = [
            'message' => 'Balita Gizi Buruk',
            'data' => $gizbu
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
        $balita = Balita::orderBy('idb', 'DESC')->get();
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
        $balita = Balita::orderBy('idb', 'ASC')->get();
        $response = [
            'message' => 'Daftar balita di urutkan berdasarkan nama',
            'data' => $balita
        ];

        return response()->json($response, Response::HTTP_OK);
    }
}