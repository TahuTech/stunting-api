<?php

use App\Http\Controllers\BalitaController;
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
