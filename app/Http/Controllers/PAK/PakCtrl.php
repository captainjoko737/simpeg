<?php

namespace App\Http\Controllers\PAK;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class PakCtrl extends Controller {
    
    public function indexDosen() {
        
        $data['title'] = 'Layanan PAK';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_prodi = Auth::user()->id_prodi;
        
        $result = DB::table('users')
        ->join('kepegawaian', 'kepegawaian.id_user', '=', 'users.id_user')
        ->where('id_prodi', '=', $id_prodi)
        ->get();

        

        $data['result'] = $result;

        // return $data;

        return view('PAK.index', $data);
    }

    public function detailDosen() {
        
        $data['title'] = 'Layanan PAK';
        
        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;
        

        return view('PAK.detail', $data);
    }

}
