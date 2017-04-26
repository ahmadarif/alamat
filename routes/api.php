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

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Clear Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});