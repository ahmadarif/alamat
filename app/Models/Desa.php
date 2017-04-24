<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * @property string id
 * @property string kecamatan_id
 * @property string name
 */
class Desa extends Model
{
    use Searchable;

    protected $table = 'desa';
    public $timestamps = false;

    protected $casts = [
        'id' => 'string'
    ];

    public function kecamatan() {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }
}
