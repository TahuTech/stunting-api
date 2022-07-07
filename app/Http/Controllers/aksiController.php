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

        // $knn = Knn::orderBy('created_at', 'desc')->first();
        $newdata = Knn::orderBy('created_at', 'desc')->first();
        //$newdata = KnnController::show($idlast);

        $u = $newdata->u;
        $bb = $newdata->bb;
        $tb = $newdata->tb;
        $lkkepala = $newdata->lkkepala;

        //hitung banyak dataset
        $Cdataset = Dataset::count();
        //sementara namanya temp
        $Ctemp = temp::count();

        //ambil database dari dataset/temp
        $datasetU =[];
        $datasetbb =[];
        $datasettb = [];
        $datasetlk = [];

        $result =  DB::select('select * from temp');

        foreach ($result as $row) {
            array_push($datasetU, $row->u);
            array_push($datasetbb, $row->bb);
            array_push($datasettb, $row->tb);
            array_push($datasetlk, $row->lkkepala);
        }
        die;

        function euclidian(){
            (datasetu-u) + (datasetbb-bb)
            sqrt(dataset-u)
        }

        $s1 = $u-$datasetU[0];
        $s2 = $bb - $datasetbb[0];
        sqrt(
            pow($s1,2)
        );

        function banyakbalita()
        {
            $mbalita = Balita::count();
            echo  "banyak balitanya " . $mbalita;
        }

        banyakbalita();

        echo "u nya " . $u . "\n";
        echo "bb nya " . $bb . "\n";
        echo "tb nya " . $tb . "\n";
        echo "lkkepala nya " . $lkkepala;
    }

    public function banyakbalita()
    {
        $mbalita = Balita::count();
        echo $mbalita;
    }

    public function euclidian(){
        pow($x1+$x2);
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
