<?php

namespace App\Http\Controllers\Penelitian;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PublikasiKaryaCtrl extends Controller {
    
    public function index() {

        $data['title'] = 'Publikasi Karya';

        return view('penelitian.publikasi_karya', $data);

    }

}
