<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MPelaksanaanPendidikan extends Model {
    protected $table = 'pelaksanaan_pendidikan';
    protected $primaryKey = 'id_pelaksanaan_pendidikan';

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'nama_pelaksanaan',
        'semester',
        'jumlah_sks',
        'angka_kredit',
        'periode',
        'bukti_fisik'
,    ];

}
