<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balita;
use App\Models\Info;
use App\Models\Knn;
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
        $info = Info::orderBy('id', 'desc')->get();
        $response = [
            'message' => 'Info Statistik',
            'data' => $info
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function countall()
    {
        $jml = DB::table('balitas')->count();
        $norm = Knn::where('stunting', '=', '2')->count();
        $stun = Knn::where('stunting', '=', '1')->count();

        $gizle = Knn::where('gizi', '=', '1')->count();
        $gizba = Knn::where('gizi', '=', '2')->count();
        $gizku = Knn::where('gizi', '=', '3')->count();
        $gizbu = Knn::where('gizi', '=', '4')->count();

        $tintin = Knn::where('tinggi', '=', '1')->count();
        $tinnor = Knn::where('tinggi', '=', '2')->count();
        $tinpen = Knn::where('tinggi', '=', '3')->count();
        $tinspen = Knn::where('tinggi', '=', '4')->count();

        $berle = Knn::where('berat', '=', '1')->count();
        $berba = Knn::where('berat', '=', '2')->count();
        $berku = Knn::where('berat', '=', '3')->count();
        $bersku = Knn::where('berat', '=', '4')->count();

        // dump($jml);
        // dump($norm);
        // dump($stun);

        // dump($gizle);
        // dump($gizba);
        // dump($gizku);
        // dump($gizbu);

        // dump($tintin);
        // dump($tinnor);
        // dump($tinpen);
        // dump($tinspen);

        // dump($berle);
        // dump($berba);
        // dump($berku);
        // dump($bersku);

        // die;
        //masuk kedalam database
        DB::table('infos')
            ->where('id', 1)
            ->update(
                [
                    'jmlbb' => $jml,
                    'norm' => $norm,
                    'stun' => $stun,
                    'gizle' => $gizle,
                    'gizba' => $gizba,
                    'gizku' => $gizku,
                    'gizbu' => $gizbu,
                    'tintin' => $tintin,
                    'tinnor' => $tinnor,
                    'tinpen' => $tinpen,
                    'tinspen' => $tinspen,
                    'berle' => $berle,
                    'berba' => $berba,
                    'berku' => $berku,
                    'bersku' => $bersku
                ]
            );
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
        $gizbu = DB::select('SELECT * FROM knns join balitas on knns.id_balita = balitas.idb where gizi=4 ');
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
    public function tinggi()
    {
        $tinggi = DB::select('SELECT * FROM knns join balitas on knns.id_balita = balitas.idb where tinggi=1 ');
        $response = [
            'message' => 'Balita Tinggi Lebih',
            'data' => $tinggi
        ];

        return response()->json($response, Response::HTTP_OK);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tingno()
    {
        $tingno = DB::select('SELECT * FROM knns join balitas on knns.id_balita = balitas.idb where tinggi=2 ');
        $response = [
            'message' => 'Balita Tinggi Baik',
            'data' => $tingno
        ];

        return response()->json($response, Response::HTTP_OK);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tingpen()
    {
        $tingpen = DB::select('SELECT * FROM knns join balitas on knns.id_balita = balitas.idb where tinggi=3 ');
        $response = [
            'message' => 'Balita Tinggi Pendek',
            'data' => $tingpen
        ];

        return response()->json($response, Response::HTTP_OK);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tingspen()
    {
        $tingspen = DB::select('SELECT * FROM knns join balitas on knns.id_balita = balitas.idb where tinggi=4 ');
        $response = [
            'message' => 'Balita Tinggi Sangat Pendek',
            'data' => $tingspen
        ];

        return response()->json($response, Response::HTTP_OK);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function beratt()
    {
        $beratt = DB::select('SELECT * FROM knns join balitas on knns.id_balita = balitas.idb where berat=1 ');
        $response = [
            'message' => 'Balita Obesitas Lebih',
            'data' => $beratt
        ];

        return response()->json($response, Response::HTTP_OK);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bernor()
    {
        $bernor = DB::select('SELECT * FROM knns join balitas on knns.id_balita = balitas.idb where berat=2 ');
        $response = [
            'message' => 'Balita Berat Baik',
            'data' => $bernor
        ];

        return response()->json($response, Response::HTTP_OK);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function berkur()
    {
        $berkur = DB::select('SELECT * FROM knns join balitas on knns.id_balita = balitas.idb where berat=3 ');
        $response = [
            'message' => 'Balita Kurus',
            'data' => $berkur
        ];

        return response()->json($response, Response::HTTP_OK);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function berskur()
    {
        $berskur = DB::select('SELECT * FROM knns join balitas on knns.id_balita = balitas.idb where berat=4 ');
        $response = [
            'message' => 'Balita Sangat Kurus',
            'data' => $berskur
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