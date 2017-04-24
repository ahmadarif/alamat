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

    public function provinsiSearch(Request $request) {
        $this->validate($request, [
            'q' => 'required'
        ]);
        return response()->json(['data' => Provinsi::search($request->input('q'))->get()]);
    }

    public function kabupatenKota() {
        $data = collect(KabupatenKota::orderBy('name')->paginate(100));
        return response()->json($data->only('data', 'current_page', 'last_page'));
    }

    public function kabupatenKotaSearch(Request $request) {
        $this->validate($request, [
            'q' => 'required'
        ]);
        return response()->json(['data' => KabupatenKota::search($request->input('q'))->get()]);
    }

    public function kecamatan() {
        $data = collect(Kecamatan::orderBy('name')->paginate(100));
        return response()->json($data->only('data', 'current_page', 'last_page'));
    }

    public function kecamatanSearch(Request $request) {
        $this->validate($request, [
            'q' => 'required'
        ]);
        return response()->json(['data' => Kecamatan::search($request->input('q'))->get()]);
    }

    public function desa() {
        $data = collect(Desa::orderBy('name')->paginate(100));
        return response()->json($data->only('data', 'current_page', 'last_page'));
    }

    public function desaSearch(Request $request) {
        $this->validate($request, [
            'q' => 'required'
        ]);
        return response()->json(['data' => Desa::search($request->input('q'))->get()]);
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
