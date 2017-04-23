<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Desa extends Model
{
    use Searchable;

    protected $table = 'desa';
    public $timestamps = false;

    public function kecamatan() {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }
}
