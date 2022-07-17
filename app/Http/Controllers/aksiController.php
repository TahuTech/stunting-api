<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\Dataset;
use App\Models\Knn;
use App\Models\temp;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class aksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //    dump($result);
        //return response()->json(['data' => $result]);

        // $result = DB::select('select * from balitas');
        // $test = [];

        // foreach ($result as $row) {
        //     array_push($test, $row->id);
        // }
        // dump($test);
        // die;

        //Ambil data last from database
        $newdata = Knn::orderBy('id', 'desc')->first();

        $iddata = $newdata->id;
        $u = $newdata->u;
        $bb = $newdata->bb;
        $tb = $newdata->tb;
        $lkkepala = $newdata->lkkepala;

        //data last berhasil
        // dump($u);
        // dump($bb);
        // dump($tb);
        // dump($lkkepala);
        // die;

        //hitung banyak dataset
        $Cdataset = Dataset::count();

        //banyak dataset berhasil
        // dump($Cdataset);
        // die;


        //ambil database dari dataset
        $datasetU = [];
        $datasetbb = [];
        $datasettb = [];
        $datasetlk = [];


        $result =  DB::select('select * from datasets');

        foreach ($result as $row) {
            array_push($datasetU, $row->du);
            array_push($datasetbb, $row->dbb);
            array_push($datasettb, $row->dtb);
            array_push($datasetlk, $row->dlkkepala);
        }

        //select dataset berhasil
        // dump($datasetU);
        // dump($datasetbb);
        // dump($datasettb);
        // dump($datasetlk);
        // die;


        //perhitungan euclidian
        for ($i = 0; $i < $Cdataset; $i++) {
            $x1 = pow(($datasetU[$i] - $u), 2);
            $x2 = pow(($datasetbb[$i] - $bb), 2);
            $x3 = pow(($datasettb[$i] - $tb), 2);
            $x4 = pow(($datasetlk[$i] - $lkkepala), 2);

            //akar kuadrad
            $hasil = sqrt($x1 + $x2 + $x3 + $x4);

            //update jarak dalam database dataset
            DB::table('datasets')
                ->where('id', 1 + $i)
                ->update(
                    ['jarak' => $hasil]
                );
        }


        //nilai k yang sudah ditentukan
        $k = 3;
        //urutkan data dari yang terkecil jaraknya
        $uji =  DB::select('select * from datasets order by jarak limit ' . $k);

        // $ujidata = DB::table('datasets')->orderBy('jarak', 'asc')->limit($k)->get();
        // $ujidata =  DB::table('datasets')->skip(10)->take(3)->get();

        // dump($uji);
        // die;

        //variabel tampung yang menjadi acuan
        $dgiz = [];
        $dbb = [];
        $dtb = [];
        $dstun = [];

        foreach ($uji as $row) {
            array_push($dgiz, $row->dgizi);
        }

        dump($dgiz);

        $distinctdata = array_unique($dgiz);
        dump($distinctdata);


        $var = [];
        for ($d = 0; $d < count($distinctdata); $d++) {
            $var[$d] = 0;

            for ($i = 0; $i < count($dgiz); $i++) {
                if ($distinctdata[$d] == $dgiz[$i]) {
                    $var[$d]++;
                }
            }
        }

        dump($var[0]);
        dump($var[1]);


        if ($var[0] > $var[1]) {
            $knngiz = $distinctdata[0];
        } else {
            $knngiz = $distinctdata[1];
        }

        dump($knngiz);

        die;

        //last data

        DB::table('knns')
            ->where('id', $iddata)
            ->update(
                ['gizi' => $hasil]
            );
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}