<?php

namespace App\Http\Controllers;

use App\Http\Controllers\KnnController;
use App\Models\Knn;
use App\Models\temp;
use Illuminate\Http\Request;

class perhitungan extends Controller
{
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
        // $knn = Knn::orderBy('created_at', 'desc')->first();
        $idlast = Knn::count();
        //$newdata = Knn::orderBy('created_at', 'desc')->first()->get();
        $newdata = Knn::where('id', '=', $idlast)->get();
        //$newdata = KnnController::show($idlast);
        $u = $newdata->u;
        $bb = $newdata->bb;
        $tb = $newdata->tb;
        $lkkepala = $newdata->lkkepala;
    }

    public function euclidian()
    {
        $dataset = temp::count();
        for ($i = 0; $i < $dataset; $i++) {
            #
        }
    }
}
