<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $table = 'desa';
    public $timestamps = false;

    public function kecamatan() {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }
}
