<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Provinsi extends Model
{
    use Searchable;

    protected $table = 'provinsi';
    public $timestamps = false;

    public function kabupatenKota() {
        return $this->hasMany(KabupatenKota::class, 'provinsi_id');
    }
}
