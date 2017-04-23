<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function provinsi() {
        $data = Provinsi::orderBy('name')->get();
        return response()->json($data);
    }
}
