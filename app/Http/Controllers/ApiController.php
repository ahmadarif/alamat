<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function provinsi() {
        $data = collect(Provinsi::orderBy('name')->paginate(100));
        return response()->json($data->only('data', 'current_page', 'last_page'));
    }
}
