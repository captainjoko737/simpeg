<?php

namespace App\Http\Controllers\Kopetensi;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SertifikasiCtrl extends Controller {
    
    public function index() {

        $data['title'] = 'Sertifikasi';

        return view('Kopetensi.sertifikasi', $data);

    }

}
