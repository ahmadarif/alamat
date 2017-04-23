<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KabupatenKota extends Model
{
    protected $table = 'kabupaten_kota';
    public $timestamps = false;

    public function provinsi() {
        return $this->belongsTo(Provinsi::class, 'provinsi_id');
    }

    public function kecamatan() {
        return $this->hasMany(Kecamatan::class, 'kabupaten_kota_id');
    }
}
