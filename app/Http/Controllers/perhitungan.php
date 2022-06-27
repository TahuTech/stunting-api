<?php

namespace App\Http\Controllers;

use App\Http\Controllers\KnnController;
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
        $knn = Knn::orderBy('created_at', 'desc')->first();
        $u = [$knn => 'u'];
    }

    public function euclidian()
    {
        $dataset = temp::count();
        for ($i = 0; $i < $dataset; $i++) {
            #
        }
    }
}
