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

        die;
        //nilai k yang sudah ditentukan
        $k = 3;
        //urutkan data dari yang terkecil jaraknya
        $uji =  DB::select('select * from dataset order by jarak');


        //variabel tampung yang menjadi acuan
        $dgiz = [];
        $dbb = [];
        $dtb = [];
        $dstun = [];

        //masukkan data ke dalam array
        for ($i = 0; $i < $k; $i++) {
            array_push($dgiz, $uji->dgizi);
            array_push($dbb, $uji->dberat);
            array_push($dtb, $uji->dtinggi);
            array_push($dstun, $uji->dstunting);
        }

        //penentuan klasifikasinya

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