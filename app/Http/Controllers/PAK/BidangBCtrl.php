<?php

namespace App\Http\Controllers\PAK;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;


class BidangBCtrl extends Controller {
    
    public function GetData($id) {

                                                                    # PENUNJANG

        # A 
            # 1

        $jumlahBidangB = 0;

        $penelitianA1 = DB::table('karya_ilmiah')
            ->where('id_user', '=', $id)
            ->where('is_publikasi', '=', '1')
            ->get();

        $jumlah = 0;

        foreach ($penelitianA1 as $key => $value) {
            $jumlah += $value->angka_kredit;
        }

        $jumlahBidangB += $jumlah;

        // return $jumlahBidangD;
        $data['penelitianA1Count'] = $jumlah;
        $data['penelitianA1'] = $penelitianA1;

        # A 
            # 2

        // $jumlahBidangB = 0;

        $penelitianA2 = DB::table('karya_ilmiah')
            ->where('id_user', '=', $id)
            ->where('is_publikasi', '=', '0')
            ->get();

        $jumlah = 0;

        foreach ($penelitianA2 as $key => $value) {
            $jumlah += $value->angka_kredit;
        }

        $jumlahBidangB += $jumlah;

        $data['penelitianA2Count'] = $jumlah;
        $data['penelitianA2'] = $penelitianA2;

        # B

        $penelitianB = DB::table('menyadur_buku_ilmiah')
            ->where('id_user', '=', $id)
            ->get();

        $jumlah = 0;

        foreach ($penelitianB as $key => $value) {
            $jumlah += $value->angka_kredit;
        }

        $jumlahBidangB += $jumlah;
        $data['penelitianBCount'] = $jumlah;
        $data['penelitianB'] = $penelitianB;

        # C

        $penelitianC = DB::table('menyuting_karya_ilmiah')
            ->where('id_user', '=', $id)
            ->get();

        $jumlah = 0;

        foreach ($penelitianC as $key => $value) {
            $jumlah += $value->angka_kredit;
        }

        $jumlahBidangB += $jumlah;
        $data['penelitianCCount'] = $jumlah;
        $data['penelitianC'] = $penelitianC;

        # D

        $penelitianD = DB::table('karya_teknologi')
            ->where('id_user', '=', $id)
            ->get();

        $jumlah = 0;

        foreach ($penelitianD as $key => $value) {
            $jumlah += $value->angka_kredit;
        }

        $jumlahBidangB += $jumlah;
        $data['penelitianDCount'] = $jumlah;
        $data['penelitianD'] = $penelitianD;

        # E

        $penelitianE = DB::table('rancangan_karya_seni')
            ->where('id_user', '=', $id)
            ->get();

        $jumlah = 0;

        foreach ($penelitianE as $key => $value) {
            $jumlah += $value->angka_kredit;
        }

        $jumlahBidangB += $jumlah;
        $data['penelitianECount'] = $jumlah;
        $data['penelitianE'] = $penelitianE;

        

        $data['jumlahBidangB'] = $jumlahBidangB;

        return $data;
    }
}
