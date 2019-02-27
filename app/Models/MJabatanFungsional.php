<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MJabatanFungsional extends Model {
    
	protected $table = 'jabatan_fungsional';
    protected $primaryKey = 'id_jabatan_fungsional';

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'jabatan_fungsional',
        'nomor_sk',
        'terhitung_mulai_tanggal',
        'kelebihan_pengajaran',
        'kelebihan_penelitian',
        'kelebihan_pengabdian_masyarakat',
        'kelebihan_kegiatan_penunjang',
    ];

}
