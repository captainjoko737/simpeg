<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MKepegawaian extends Model {

    protected $table = 'kepegawaian';
    protected $primaryKey = 'id_kepegawaian';

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'nip',
        'nomor_sk_cpns',
        'sk_cpns_terhitung_mulai_tanggal',
        'nomor_sk_pns',
        'tanggal_menjadi_pns',
        'sumber_gaji',
    ];
}

 	 	 	 	 