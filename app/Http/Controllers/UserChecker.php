<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserChecker extends Controller {
    
    public function checkUser($user) {

        if ($user) {
            $data['is_logout'] = 'show';
            $data['is_login'] = 'hidden';
            if ($user->is_admin == 0) {
                # IS USER DOSEN
                $data['is_admin'] = 'hidden';
                $data['menu_dosen'] = 'show';
            }else{
                # IS USER PRODI / ADMIN / WHATEVER YOU WANT
                $data['is_admin'] = 'show';
                $data['menu_dosen'] = 'hidden';
            }
        }else{
            $data['menu_dosen'] = 'hidden';
            $data['is_logout'] = 'hidden';
            $data['is_login'] = 'show';
        }
        
        return $data;
    }
}
