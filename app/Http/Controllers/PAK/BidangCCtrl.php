<?php

namespace App\Http\Controllers\PAK;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class BidangCCtrl extends Controller {
    
                                                                   # PENGABDIAN

    public function GetData($id) {

    	# A

        $jumlahBidangC = 0;

        $pengabdianA = DB::table('pengabdian')
            ->where('id_user', '=', $id)
            ->where('kategori', '=', 'A')
            ->get();

        $jumlah = 0;

        foreach ($pengabdianA as $key => $value) {
            $jumlah += $value->angka_kredit;
        }

        $jumlahBidangC += $jumlah;
        $data['pengabdianACount'] = $jumlah;
        $data['pengabdianA'] = $pengabdianA;

        # B

        $pengabdianB = DB::table('pengabdian')
            ->where('id_user', '=', $id)
            ->where('kategori', '=', 'B')
            ->get();

        $jumlah = 0;

        foreach ($pengabdianB as $key => $value) {
            $jumlah += $value->angka_kredit;
        }

        $jumlahBidangC += $jumlah;
        $data['pengabdianBCount'] = $jumlah;
        $data['pengabdianB'] = $pengabdianB;

        # C

        $pengabdianC = DB::table('pengabdian')
            ->where('id_user', '=', $id)
            ->where('kategori', '=', 'C')
            ->get();

        $jumlah = 0;

        foreach ($pengabdianC as $key => $value) {
            $jumlah += $value->angka_kredit;
        }

        $jumlahBidangC += $jumlah;
        $data['pengabdianCCount'] = $jumlah;
        $data['pengabdianC'] = $pengabdianC;

        # D

        $pengabdianD = DB::table('pengabdian')
            ->where('id_user', '=', $id)
            ->where('kategori', '=', 'D')
            ->get();

        $jumlah = 0;

        foreach ($pengabdianD as $key => $value) {
            $jumlah += $value->angka_kredit;
        }

        $jumlahBidangC += $jumlah;
        $data['pengabdianDCount'] = $jumlah;
        $data['pengabdianD'] = $pengabdianD;

        # E

        $pengabdianE = DB::table('pengabdian')
            ->where('id_user', '=', $id)
            ->where('kategori', '=', 'E')
            ->get();

        $jumlah = 0;

        foreach ($pengabdianE as $key => $value) {
            $jumlah += $value->angka_kredit;
        }

        $jumlahBidangC += $jumlah;
        $data['pengabdianECount'] = $jumlah;
        $data['pengabdianE'] = $pengabdianE;

        $data['jumlahBidangC'] = $jumlahBidangC;

        return $data;
    }
    
}
