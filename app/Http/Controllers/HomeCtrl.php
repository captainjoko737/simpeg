<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class HomeCtrl extends Controller {

    public function index() {

        $data['title'] = 'Home';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $jumlahFakultas = DB::table('prodi')->get();
        $jumlahDosen = DB::table('users')->where('is_admin', '=', 0)->get();

        $fakultas = DB::table('prodi')->get();
        $arr = [];
        foreach ($fakultas as $key => $value) {
        	$dosen = DB::table('users')->where('is_admin', '=', 0)->where('id_prodi', '=', $value->id_prodi)->get();
        	$fakultas[$key]->dosen = count($dosen);
        }

        $data['jumlah_fakultas'] = count($jumlahFakultas);
        $data['jumlah_dosen'] = count($jumlahDosen);
        $data['fakultas'] = $fakultas;

        // return $data;
        return view('home.index', $data);
    }

}
