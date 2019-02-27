<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MPenelitian extends Model {
    
    protected $table = 'penelitian';
    protected $primaryKey = 'id_penelitian';

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'judul_kegiatan',
        'kategori_kegiatan',
        'lembaga_iptek',
        'kelompok_bidang',
        'jenis_skim',
        'lokasi_kegiatan',
        'tahun_usulan',
        'tahun_kegiatan',
        'tahun_pelaksanaan',
        'lama_kegiatan',
        'tahun_pelaksanaan_ke',
        'dana_dari_dikti',
        'dana_dari_perguruan_tinggi',
        'dana_dari_institusi_lain',
        'in_kind',
        'nomor_sk_penugasan',
        'tanggal_sk_penugasan',

    ];
}

 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	