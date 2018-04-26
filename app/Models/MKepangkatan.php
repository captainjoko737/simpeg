<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MKepangkatan extends Model {
    
    protected $table = 'kepangkatan';
    protected $primaryKey = 'id_kepangkatan';

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'golongan_pangkat',
        'nomor_sk_kepangkatan',
        'tanggal_sk',
        'terhitung_mulai_tanggal',
        'angka_kredit',
        'masa_kerja_tahun',
        'masa_kerja_bulan',
    ];

}
