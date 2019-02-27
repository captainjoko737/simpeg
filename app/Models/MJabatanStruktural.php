<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MJabatanStruktural extends Model {
    
    protected $table = 'jabatan_struktural';
    protected $primaryKey = 'id_jabatan_struktural';

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'jabatan_tugas',
        'kategori_kegiatan',
        'nomor_sk_jabatan_struktural',
        'terhitung_mulai_tanggal',
        'lokasi_penugasan',
    ];
}

 	 	