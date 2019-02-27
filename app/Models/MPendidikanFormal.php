<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MPendidikanFormal extends Model {
    
    protected $table = 'pendidikan_formal';
    protected $primaryKey = 'id_pendidikan_formal';

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'jenjang_studi',
        'gelar_akademik',
        'bidang_studi',
        'perguruan_tinggi',
        'fakultas',
        'program_studi',
        'tahun_masuk',
        'tahun_lulus',
        'tanggal_kelulusan',
    ];
}
