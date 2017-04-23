<?php

use Illuminate\Http\Request;

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

Route::get('/provinsi', 'ApiController@provinsi');
Route::get('/kabupatenKota', 'ApiController@kabupatenKota');
Route::get('/kecamatan', 'ApiController@kecamatan');
Route::get('/desa', 'ApiController@desa');
Route::get('/{provinsiId}', 'ApiController@kabupatenKotaByProvinsi');
Route::get('/{provinsiId}/{kabupatenKotaId}', 'ApiController@kecamatanByProvinsiAndKabupatenKota');
Route::get('/{provinsiId}/{kabupatenKotaId}/{kecamatanId}', 'ApiController@desanByProvinsiAndKabupatenKotaAndKecamatan');