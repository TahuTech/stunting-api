<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\Dataset;
use App\Models\Knn;
use App\Models\temp;
use Illuminate\Http\Request;

class aksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Ambil data last from database

        // $knn = Knn::orderBy('created_at', 'desc')->first();
        $newdata = Knn::orderBy('created_at', 'desc')->first();
        //$newdata = KnnController::show($idlast);

        $u = $newdata->u;
        $bb = $newdata->bb;
        $tb = $newdata->tb;
        $lkkepala = $newdata->lkkepala;

        //ambil banyak dataset
        $Cdataset = Dataset::count();
        //sementara namanya temp
        $Ctemp = temp::count();

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
