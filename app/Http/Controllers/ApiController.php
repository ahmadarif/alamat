<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function provinsi() {
        $data = collect(Provinsi::orderBy('name')->paginate(100));
        return response()->json($data->only('data', 'current_page', 'last_page'));
    }

    public function kabupatenKota() {
        $data = collect(KabupatenKota::orderBy('name')->paginate(100));
        return response()->json($data->only('data', 'current_page', 'last_page'));
    }

    public function kecamatan() {
        $data = collect(Kecamatan::orderBy('name')->paginate(100));
        return response()->json($data->only('data', 'current_page', 'last_page'));
    }

    public function desa() {
        $data = collect(Desa::orderBy('name')->paginate(100));
        return response()->json($data->only('data', 'current_page', 'last_page'));
    }

    public function kabupatenKotaByProvinsi($provinsiId) {
        $data = collect(Provinsi::findOrFail($provinsiId)->kabupatenKota()->orderBy('name')->paginate(100));
        return response()->json($data->only('data', 'current_page', 'last_page'));
    }
}
