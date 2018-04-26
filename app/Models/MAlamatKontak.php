<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MAlamatKontak extends Model {
    
    protected $table = 'alamat_kontak';
    protected $primaryKey = 'id_alamat_kontak';

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'email',
        'alamat',
        'rt',
        'rw',
        'dusun',
        'desa_kabupaten',
        'kota_kabupaten',
        'provinsi',
        'kode_pos',
        'no_telepon_rumah',
        'no_hp',
    ];
}
