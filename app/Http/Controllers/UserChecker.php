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
                $data['is_admin_prodi'] = 'hidden';
                $data['is_admin'] = 'hidden';
                $data['menu_dosen'] = 'show';
            }else if ($user->is_admin == 1){
                # IS ADMIN PRODI 
                $data['is_admin_prodi'] = 'hidden';
                $data['is_admin'] = 'show';
                $data['menu_dosen'] = 'hidden';
            }else if ($user->is_admin == 2) {
                # IS ADMIN SIMPEG
                $data['is_admin_prodi'] = 'show';
                $data['is_admin'] = 'hidden';
                $data['menu_dosen'] = 'hidden';
            }
        }else{
            $data['is_admin_prodi'] = 'hidden';
            $data['is_admin'] = 'hidden';
            $data['menu_dosen'] = 'hidden';
            $data['is_logout'] = 'hidden';
            $data['is_login'] = 'show';
        }
        
        return $data;
    }
}
