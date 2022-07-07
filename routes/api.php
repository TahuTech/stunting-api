<?php

use App\Http\Controllers\BalitaController;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\KnnController;
use App\Http\Controllers\SaranController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//balita controller
// Route::get('/balita', [BalitaController::class, 'index']);
// Route::post('/balita', [BalitaController::class, 'store']);
// Route::get('/balita/{id}', [BalitaController::class, 'show']);
// Route::put('/balita/{id}', [BalitaController::class, 'update']);
// Route::delete('/balita/{id}', [BalitaController::class, 'destroy']);

Route::resource('/balita', BalitaController::class)->except(['create', 'edit']);

//saran api route
Route::resource('/saran', SaranController::class)->except(['create', 'edit']);

//knn api route
Route::resource('/knn', KnnController::class)->except(['create', 'edit']);

//dataset api route
Route::resource('/dataset', DatasetController::class)->except(['create', 'edit']);


Route::get('/knns', [KnnController::class, 'lastdata']);

Route::apiResource('/aksi', App\Http\Controllers\aksiController::class);
