<?php

use App\Http\Controllers\LebihKerjaController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\LogAbsenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\LiburNasionalController;
use App\Http\Controllers\AbsenNonKerjaController;
use App\Http\Controllers\AkumulasiTahunanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('karyawan', UserController::class);
Route::post('/get_number', 'App\Http\Controllers\AkumulasiTahunanController@getUniqueNumber');
Route::post('/authenticate', 'App\Http\Controllers\UserController@authUser');
Route::post('/cuti/create/store', 'App\Http\Controllers\CutiController@storeMobile');
Route::get('/libur_nasional', 'App\Http\Controllers\LiburNasionalController@index');
Route::resource('lebihKerja', LebihKerjaController::class);
Route::resource('cuti', CutiController::class);
Route::resource('lembur', LemburController::class);
Route::resource('libur_nasional', LiburNasionalController::class);
// Route::apiResource('lembur','API\LemburController',array("as"=>"api"));
Route::resource('absen_non_kerja', AbsenNonKerjaController::class);
// Route::apiResource('absen_non_kerja', 'API\AbsenNonKerjaController', array("as"=>"api"));
Route::resource('log_absen', LogAbsenController::class);
Route::post('/lembur/create/store', 'App\Http\Controllers\LemburController@storeMobileLembur');
// Route::resource('authenticate', UserController::class);
// Route::apiResource('log_absen', 'API\LogAbsenController', array("as"=>"api"));
// Route::apiResource('karyawan','API\UserController',array("as"=>"api"));
// Route::get('/getDataAbsen', 'App\Http\Controllers\LogAbsenController@getLogAbsen');