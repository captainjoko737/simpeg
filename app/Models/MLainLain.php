<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MLainLain extends Model {
    
    protected $table = 'lain_lain';
    protected $primaryKey = 'id_lain_lain';

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'npwp',
        'nama_wajib_pajak',
    ];
}
