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

    public function kecamatanByProvinsiAndKabupatenKota($provinsiId, $kabupatenKotaId) {
        $kecamatan = collect(
            Provinsi::findOrFail($provinsiId)
                ->kabupatenKota()
                ->findOrFail($kabupatenKotaId)
                ->kecamatan()
                ->orderBy('name')
                ->paginate(100)
        );
        return response()->json($kecamatan->only('data', 'current_page', 'last_page'));
    }

    public function desaByProvinsiAndKabupatenKotaAndKecamatan($provinsiId, $kabupatenKotaId, $kecamatanId) {
        $kecamatan = collect(
            Provinsi::findOrFail($provinsiId)
                ->kabupatenKota()
                ->findOrFail($kabupatenKotaId)
                ->kecamatan()
                ->findOrFail($kecamatanId)
                ->desa()
                ->orderBy('name')
                ->paginate(100)
        );
        return response()->json($kecamatan->only('data', 'current_page', 'last_page'));
    }

    public function search(Request $request) {
        $this->validate($request, [
            'q' => 'required'
        ]);
        return Desa::search($request->input('q'))->get();
    }
}
