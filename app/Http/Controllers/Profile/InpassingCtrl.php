<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InpassingCtrl extends Controller {
    
    public function index() {
        
        $data['title'] = 'Inpassing';

        return view('profile.inpassing', $data);

    }

}
