<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $message = 'REST API : Alamat Indonesia';
    $data = [
        [
            'method' => 'GET',
            'url' => '{host}/api/provinsi',
            'deskripsi' => 'Data provinsi di indonesia'
        ],
        [
            'method' => 'GET',
            'url' => '{host}/api/provinsi/search?q=<KEYWORD>',
            'deskripsi' => 'Data provinsi di indonesia berdasarkan pencarian'
        ],
        [
            'method' => 'GET',
            'url' => '{host}/api/kabupatenKota',
            'deskripsi' => 'Data kabupaten atau kota di indonesia'
        ],
        [
            'method' => 'GET',
            'url' => '{host}/api/kabupatenKota/search?q=<KEYWORD>',
            'deskripsi' => 'Data kabupaten atau kota di indonesia berdasarkan pencarian'
        ],
        [
            'method' => 'GET',
            'url' => '{host}/api/kecamatan',
            'deskripsi' => 'Data kecamatan di indonesia'
        ],
        [
            'method' => 'GET',
            'url' => '{host}/api/kecamatan/search?q=<KEYWORD>',
            'deskripsi' => 'Data kecamatan di indonesia berdasarkan pencarian'
        ],
        [
            'method' => 'GET',
            'url' => '{host}/api/desa',
            'deskripsi' => 'Data desa di indonesia'
        ],
        [
            'method' => 'GET',
            'url' => '{host}/api/desa/search?q=<KEYWORD>',
            'deskripsi' => 'Data desa di indonesia berdasarkan pencarian'
        ],
        [
            'method' => 'GET',
            'url' => '{host}/api/search/{provinsi_id}',
            'deskripsi' => 'Data kabupaten atau kota di indonesia berdasarkan ID provinsi'
        ],
        [
            'method' => 'GET',
            'url' => '{host}/api/search/{provinsi_id}/{kabupaten_kota_id}',
            'deskripsi' => 'Data kecamatan di indonesia berdasarkan ID provinsi dan ID kabupaten atau kota'
        ],
        [
            'method' => 'GET',
            'url' => '{host}/api/search/{provinsi_id}/{kabupaten_kota_id}/{kecamatan_id}',
            'deskripsi' => 'Data desa di indonesia berdasarkan ID provinsi dan ID kabupaten atau kota dan ID kecamatan'
        ]
    ];
    return response()->json(compact('message', 'data'));
});
