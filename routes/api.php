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
Route::get('/provinsi/search', 'ApiController@provinsiSearch');

Route::get('/kabupatenKota', 'ApiController@kabupatenKota');
Route::get('/kabupatenKota/search', 'ApiController@kabupatenKotaSearch');

Route::get('/kecamatan', 'ApiController@kecamatan');
Route::get('/kecamatan/search', 'ApiController@kecamatanSearch');

Route::get('/desa', 'ApiController@desa');
Route::get('/desa/search', 'ApiController@desaSearch');

Route::get('/search', 'ApiController@search');
Route::get('/search/{provinsiId}', 'ApiController@kabupatenKotaByProvinsi');
Route::get('/search/{provinsiId}/{kabupatenKotaId}', 'ApiController@kecamatanByProvinsiAndKabupatenKota');
Route::get('/search/{provinsiId}/{kabupatenKotaId}/{kecamatanId}', 'ApiController@desaByProvinsiAndKabupatenKotaAndKecamatan');