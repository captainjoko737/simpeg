<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MKeluarga extends Model {
    
    protected $table = 'keluarga';
    protected $primaryKey = 'id_keluarga';

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'nama_ibu_kandung',
        'status_perkawinan',
        'nama_suami_istri',
        'nip_suami_istri',
        'pekerjaan_suami_istri',
        'terhitung_mulai_tanggal_pns_suami_istri',
    ];
}
