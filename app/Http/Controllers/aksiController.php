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

        //nilai k dari metode knn
        $k = 5;
        //urutkan data dari yang terdekat jaraknya
        $uji =  DB::select('select * from datasets order by jarak limit ' . $k);

        // dump($uji);
        // die;

        //variabel tampung yang menjadi acuan dari dataset
        $dgiz = [];
        $dbb = [];
        $dtb = [];
        $dstun = [];

        foreach ($uji as $row) {
            array_push($dgiz, $row->dgizi);
        }

        dump($dgiz);

        // $arraytest = [1, 3, 3, 2, 1, 3, 4, 1, 1, 2, 2, 2, 2];
        $vgiz = array_count_values($dgiz);
        // $testt = array_count_values($dgiz);
        dump($vgiz);

        $panjang = count($vgiz);
        echo 'banyak jenis data yang ada yakni';
        dump($panjang);

        //menentukan nilai terbesar dalam array
        echo "<br>"; // using array_search()
        echo "nilai yang paling banyak muncul yakni :";
        $rgiz = array_search(max($vgiz), $vgiz);
        echo $rgiz;


        die;

        //last data

        DB::table('knns')
            ->where('id', $iddata)
            ->update(
                ['gizi' => $rgiz]
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