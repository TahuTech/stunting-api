<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\Dataset;
use App\Models\Knn;
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
        //Ambil data last from knn database
        $newdata = Knn::orderBy('id', 'desc')->first();

        $iddata = $newdata->id;
        $u = $newdata->u;
        $bb = $newdata->bb;
        $tb = $newdata->tb;

        //data last berhasil
        // dump($u);
        // dump($bb);
        // dump($tb);
        // die;

        //hitung banyak dataset
        $Cdataset = Dataset::count();

        //ambil database dari dataset
        $datasetU = [];
        $datasetbb = [];
        $datasettb = [];

        $result =  DB::select('select * from datasets');

        foreach ($result as $row) {
            array_push($datasetU, $row->du);
            array_push($datasetbb, $row->dbb);
            array_push($datasettb, $row->dtb);
        }

        //select dataset berhasil
        // dump($datasetU);
        // dump($datasetbb);
        // dump($datasettb);
        // die;

        ////Perhitungan Gizi////
        //perhitungan euclidian status gizi (BB/U)
        for ($i = 0; $i < $Cdataset; $i++) {
            $x1 = pow(($datasetU[$i] - $u), 2);
            $x2 = pow(($datasetbb[$i] - $bb), 2);

            //akar kuadrad
            $eucgiz = sqrt($x1 + $x2);

            //update jarak dalam database dataset
            DB::table('datasets')
                ->where('id', 1 + $i)
                ->update(
                    ['jarak' => $eucgiz]
                );
        }

        //nilai k metode knn
        $k = 5;
        //urutkan data dari yang terdekat jaraknya
        $ujigiz =  DB::select('select * from datasets order by jarak limit ' . $k);

        // dump($ujigiz);
        // die;

        //variabel Gizi tampung yang menjadi acuan dari dataset
        $dgiz = [];

        foreach ($ujigiz as $row) {
            array_push($dgiz, $row->dgizi);
        }

        die;
        dump($dgiz);

        //menghitung banyak data yang sama
        $vgiz = array_count_values($dgiz);
        dump($vgiz);

        //menentukan hasil nilai indeks terbesar dalam array
        $rgiz = array_search(max($vgiz), $vgiz);

        dump($rgiz);


        ////Perhitungan Berat////
        //perhitungan euclidian status berat (BB/TB)
        for ($i = 0; $i < $Cdataset; $i++) {
            $x3 = pow(($datasetbb[$i] - $bb), 2);
            $x4 = pow(($datasettb[$i] - $tb), 2);

            //akar kuadrad
            $eucbb = sqrt($x3 + $x4);

            //update jarak dalam database dataset
            DB::table('datasets')
                ->where('id', 1 + $i)
                ->update(
                    ['jarak' => $eucbb]
                );
        }

        //urutkan data dari yang terdekat jaraknya
        $ujibb =  DB::select('select * from datasets order by jarak limit ' . $k);

        // dump($ujibb);
        // die;

        //variabel tampung bb yang menjadi acuan dari dataset
        $dbb = [];

        foreach ($ujibb as $row) {
            array_push($dbb, $row->dbb);
        }

        die;
        dump($dbb);

        //menghitung banyak data yang sama dalam bb
        $vbb = array_count_values($dbb);
        dump($vbb);

        //menentukan hasil nilai indeks terbesar dalam array
        $rbb = array_search(max($vbb), $vbb);


        ////Perhitungan tinggi////
        //perhitungan euclidian status tinggi (tb/u)
        for ($i = 0; $i < $Cdataset; $i++) {
            $x5 = pow(($datasettb[$i] - $tb), 2);
            $x6 = pow(($datasetU[$i] - $u), 2);

            //akar kuadrad
            $euctb = sqrt($x5 + $x6);

            //update jarak dalam database dataset
            DB::table('datasets')
                ->where('id', 1 + $i)
                ->update(
                    ['jarak' => $euctb]
                );
        }

        //urutkan data dari yang terdekat jaraknya
        $ujitb =  DB::select('select * from datasets order by jarak limit ' . $k);

        // dump($ujitb);
        // die;

        //variabel tampung yang menjadi acuan dari dataset
        $dtb = [];

        foreach ($ujitb as $row) {
            array_push($dtb, $row->dtb);
        }

        die;
        dump($dtb);

        //menghitung banyak data yang sama
        $vtb = array_count_values($dtb);
        dump($vtb);

        //menentukan hasil klasifikasi tinggi
        $rtb = array_search(max($vtb), $vtb);

        //update data di table knn
        DB::table('knns')
            ->where('id', $iddata)
            ->update(
                ['gizi' => $rgiz],
                ['berat' => $rbb],
                ['tinggi' => $rtb]
            );

        //masukkan hasil knn ke dalam datasets
        dump($u);
        dump($bb);
        dump($tb);
        dump($rgiz);
        dump($rbb);
        dump($rtb);

        DB::table('datasets')->insert([
            'du' => $u,
            'dbb' => $bb,
            'dtb' => $tb,
            'jarak' => 0,
            'dgizi' => $rgiz,
            'dberat' => $rbb,
            'dtinggi' => $rtb,
            'dstunting' => 1
        ]);
    }


    /**
     * Calculate Status Gizi.
     *
     * @return \Illuminate\Http\Response
     */
    public function knngizi()
    {
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

        foreach ($uji as $row) {
            array_push($dgiz, $row->dgizi);
        }

        dump($dgiz);

        $vgiz = array_count_values($dgiz);
        dump($vgiz);

        $panjang = count($vgiz);
        echo 'banyak jenis data yang ada yakni';
        dump($panjang);

        //menentukan nilai terbesar dalam array
        echo "<br>"; // using array_search()
        echo "kelas yang paling Dominan muncul yakni : ";
        $rgiz = array_search(max($vgiz), $vgiz);
        echo $rgiz;

        // //update data di table knn

        // DB::table('knns')
        //     ->where('id', $iddata)
        //     ->update(
        //         ['gizi' => $rgiz]
        //     );

        // //masukkan hasil knn ke dalam datasets
        // dump($u);
        // dump($bb);
        // dump($tb);
        // dump($lkkepala);
        // dump($rgiz);

        // DB::table('datasets')->insert([
        //     'du' => $u,
        //     'dbb' => $bb,
        //     'dtb' => $tb,
        //     'dlkkepala' => $lkkepala,
        //     'jarak' => 0,
        //     'dgizi' => $rgiz,
        //     'dberat' => 1,
        //     'dtinggi' => 1,
        //     'dstunting' => 1
        // ]);
    }

    /**
     * Calculate Status Berat.
     *
     * @return \Illuminate\Http\Response
     */
    public function knnberat()
    {
        //Ambil data last from database
        $newdata = Knn::orderBy('id', 'desc')->first();

        $iddata = $newdata->id;
        $bb = $newdata->bb;
        $tb = $newdata->tb;

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


        $result =  DB::select('select * from datasets');

        foreach ($result as $row) {
            array_push($datasetU, $row->du);
            array_push($datasetbb, $row->dbb);
            array_push($datasettb, $row->dtb);
        }

        //select dataset berhasil
        // dump($datasetU);
        // dump($datasetbb);
        // dump($datasettb);
        // die;


        ////Perhitungan Berat////
        //perhitungan euclidian status berat (BB/TB)
        for ($i = 0; $i < $Cdataset; $i++) {
            $x3 = pow(($datasetbb[$i] - $bb), 2);
            $x4 = pow(($datasettb[$i] - $tb), 2);

            //akar kuadrad
            $eucbb = sqrt($x3 + $x4);

            //update jarak dalam database dataset
            DB::table('datasets')
                ->where('id', 1 + $i)
                ->update(
                    ['jarak' => $eucbb]
                );
        }
        //nilai k dari metode knn
        $k = 5;
        //urutkan data dari yang terdekat jaraknya
        $ujibb =  DB::select('select * from datasets order by jarak limit ' . $k);

        // dump($uji);
        // die;

        //variabel tampung yang menjadi acuan dari dataset
        $dbb = [];

        foreach ($ujibb as $row) {
            array_push($dbb, $row->dbb);
        }

        dump($dbb);

        // $arraytest = [1, 3, 3, 2, 1, 3, 4, 1, 1, 2, 2, 2, 2];
        $vbb = array_count_values($dbb);
        // $testt = array_count_values($dgiz);
        dump($vbb);

        $panjang = count($vbb);
        echo 'banyak jenis data yang ada yakni';
        dump($panjang);

        //menentukan nilai terbesar dalam array
        echo "<br>"; // using array_search()
        echo "nilai yang paling banyak muncul yakni :";
        $rbb = array_search(max($vbb), $vbb);
        echo $rbb;

        // //update data di table knn

        // DB::table('knns')
        //     ->where('id', $iddata)
        //     ->update(
        //         ['gizi' => $rgiz]
        //     );

        // //masukkan hasil knn ke dalam datasets
        // dump($u);
        // dump($bb);
        // dump($tb);
        // dump($lkkepala);
        // dump($rgiz);

        // DB::table('datasets')->insert([
        //     'du' => $u,
        //     'dbb' => $bb,
        //     'dtb' => $tb,
        //     'dlkkepala' => $lkkepala,
        //     'jarak' => 0,
        //     'dgizi' => $rgiz,
        //     'dberat' => 1,
        //     'dtinggi' => 1,
        //     'dstunting' => 1
        // ]);
    }

    /**
     * Calculate Status Tinggi.
     *
     * @return \Illuminate\Http\Response
     */
    public function knntinggi()
    {
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

        // //update data di table knn

        // DB::table('knns')
        //     ->where('id', $iddata)
        //     ->update(
        //         ['gizi' => $rgiz]
        //     );

        // //masukkan hasil knn ke dalam datasets
        // dump($u);
        // dump($bb);
        // dump($tb);
        // dump($lkkepala);
        // dump($rgiz);

        // DB::table('datasets')->insert([
        //     'du' => $u,
        //     'dbb' => $bb,
        //     'dtb' => $tb,
        //     'dlkkepala' => $lkkepala,
        //     'jarak' => 0,
        //     'dgizi' => $rgiz,
        //     'dberat' => 1,
        //     'dtinggi' => 1,
        //     'dstunting' => 1
        // ]);
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
