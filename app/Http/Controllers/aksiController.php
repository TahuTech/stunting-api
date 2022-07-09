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

        $result = DB::select('select * from balitas');
        //    dump($result);
        //return response()->json(['data' => $result]);
        $test = [];

        foreach ($result as $row) {
            array_push($test, $row->id);
        }
        dump($test);
        die;

        //Ambil data last from database
        $newdata = Knn::orderBy('created_at', 'desc')->first();

        $u = $newdata->u;
        $bb = $newdata->bb;
        $tb = $newdata->tb;
        $lkkepala = $newdata->lkkepala;

        //hitung banyak dataset
        $Cdataset = Dataset::count();

        //ambil database dari dataset
        $datasetU = [];
        $datasetbb = [];
        $datasettb = [];
        $datasetlk = [];


        $result =  DB::select('select * from dataset');

        foreach ($result as $row) {
            array_push($datasetU, $row->du);
            array_push($datasetbb, $row->dbb);
            array_push($datasettb, $row->dtb);
            array_push($datasetlk, $row->dlkkepala);
        }

        die;

        //perhitungan euclidian
        for ($i = 0; $i < $Cdataset; $i++) {
            $x1 = pow($datasetU[$i] - $u);
            $x2 = pow($datasetbb[$i] - $bb);
            $x3 = pow($datasettb[$i] - $tb);
            $x4 = pow($datasetlk[$i] - $lkkepala);

            //akar kuadrad
            $hasil = sqrt($x1 + $x2 + $x3 + $x4);

            //update jarak dalam database dataset
            DB::table('dataset')
                ->where('id', $i)
                ->update(
                    ['jarak' => $hasil]
                );
        }

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
        $giz1 = 0;
        $giz2 = 0;
        $giz3 = 0;
        $giz4 = 0;

        for ($i = 0; $i < $k; $i++) {
            if ($dgiz[$i] == 1) {
                $giz1++;
            } else if ($dgiz[$i] == 2) {
                $giz2++;
            } else if ($dgiz[$i] == 3) {
                $giz3++;
            } else if ($dgiz[$i] == 4) {
                $giz4++;
            }
        }
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