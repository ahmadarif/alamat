<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * @property string id
 * @property string name
 */
class Provinsi extends Model
{
    use Searchable;

    protected $table = 'provinsi';
    public $timestamps = false;

    protected $casts = [
        'id' => 'string'
    ];

    public function kabupatenKota() {
        return $this->hasMany(KabupatenKota::class, 'provinsi_id');
    }
}
