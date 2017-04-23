<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsi';
    public $timestamps = false;

    public function kabupatenKota() {
        return $this->hasMany(KabupatenKota::class, 'provinsi_id');
    }
}
