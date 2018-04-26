<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MBimbinganSeminar extends Model {
    
    protected $table = 'bimbingan_seminar';
    protected $primaryKey = 'id_bimbingan_seminar';

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'periode',
        'nama_bimbingan',
        'semester',
        'jumlah_sks',
        'angka_kredit',
        'bukti_fisik',
    ];
}

class MBimbinganKKP extends Model {
    
    protected $table = 'bimbingan_kkp';
    protected $primaryKey = 'id_bimbingan_kkp';

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'periode',
        'nama_bimbingan',
        'semester',
        'jumlah_sks',
        'angka_kredit',
        'bukti_fisik',
    ];
}
