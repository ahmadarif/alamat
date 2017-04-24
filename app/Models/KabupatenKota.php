<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * @property string id
 * @property string provinsi_id
 * @property string name
 */
class KabupatenKota extends Model
{
    use Searchable;

    protected $table = 'kabupaten_kota';
    public $timestamps = false;

    protected $casts = [
        'id' => 'string'
    ];

    public function provinsi() {
        return $this->belongsTo(Provinsi::class, 'provinsi_id');
    }

    public function kecamatan() {
        return $this->hasMany(Kecamatan::class, 'kabupaten_kota_id');
    }
}
