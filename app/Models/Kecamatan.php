<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * @property string id
 * @property string kabupaten_kota_id
 * @property string name
 */
class Kecamatan extends Model
{
    use Searchable;

    protected $casts = [
        'id' => 'string'
    ];

    protected $table = 'kecamatan';
    public $timestamps = false;

    public function kabupatenKota() {
        return $this->belongsTo(KabupatenKota::class, 'kabupaten_kota_id');
    }

    public function desa() {
        return $this->hasMany(Desa::class, 'kecamatan_id');
    }
}
