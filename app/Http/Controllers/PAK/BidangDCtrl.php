<?php

namespace App\Http\Controllers\PAK;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class BidangDCtrl extends Controller {
    
    public function GetData($id) {

                                                                    # PENUNJANG

        # A

        $jumlahBidangD = 0;

        $penunjangA = DB::table('penunjang')
            ->where('id_user', '=', $id)
            ->where('kategori', '=', 'A')
            ->get();

        $jumlah = 0;

        foreach ($penunjangA as $key => $value) {
            $jumlah += $value->angka_kredit;
        }

        $jumlahBidangD += $jumlah;

        // return $jumlahBidangD;
        $data['penunjangACount'] = $jumlah;
        $data['penunjangA'] = $penunjangA;

        # B

        $penunjangB = DB::table('penunjang')
            ->where('id_user', '=', $id)
            ->where('kategori', '=', 'B')
            ->get();

        $jumlah = 0;

        foreach ($penunjangB as $key => $value) {
            $jumlah += $value->angka_kredit;
        }

        $jumlahBidangD += $jumlah;
        $data['penunjangBCount'] = $jumlah;
        $data['penunjangB'] = $penunjangB;

        # C

        $penunjangC = DB::table('penunjang')
            ->where('id_user', '=', $id)
            ->where('kategori', '=', 'C')
            ->get();

        $jumlah = 0;

        foreach ($penunjangC as $key => $value) {
            $jumlah += $value->angka_kredit;
        }

        $jumlahBidangD += $jumlah;
        $data['penunjangCCount'] = $jumlah;
        $data['penunjangC'] = $penunjangC;

        # D

        $penunjangD = DB::table('penunjang')
            ->where('id_user', '=', $id)
            ->where('kategori', '=', 'D')
            ->get();

        $jumlah = 0;

        foreach ($penunjangD as $key => $value) {
            $jumlah += $value->angka_kredit;
        }

        $jumlahBidangD += $jumlah;
        $data['penunjangDCount'] = $jumlah;
        $data['penunjangD'] = $penunjangD;

        # E

        $penunjangE = DB::table('penunjang')
            ->where('id_user', '=', $id)
            ->where('kategori', '=', 'E')
            ->get();

        $jumlah = 0;

        foreach ($penunjangE as $key => $value) {
            $jumlah += $value->angka_kredit;
        }

        $jumlahBidangD += $jumlah;
        $data['penunjangECount'] = $jumlah;
        $data['penunjangE'] = $penunjangE;

        # F

        $penunjangF = DB::table('penunjang')
            ->where('id_user', '=', $id)
            ->where('kategori', '=', 'F')
            ->get();

        $jumlah = 0;

        foreach ($penunjangF as $key => $value) {
            $jumlah += $value->angka_kredit;
        }

        $jumlahBidangD += $jumlah;
        $data['penunjangFCount'] = $jumlah;
        $data['penunjangF'] = $penunjangF;

        # G

        $penunjangG = DB::table('penunjang')
            ->where('id_user', '=', $id)
            ->where('kategori', '=', 'G')
            ->get();

        $jumlah = 0;

        foreach ($penunjangG as $key => $value) {
            $jumlah += $value->angka_kredit;
        }

        $jumlahBidangD += $jumlah;
        $data['penunjangGCount'] = $jumlah;
        $data['penunjangG'] = $penunjangG;

        # H

        $penunjangH = DB::table('penunjang')
            ->where('id_user', '=', $id)
            ->where('kategori', '=', 'H')
            ->get();

        $jumlah = 0;

        foreach ($penunjangH as $key => $value) {
            $jumlah += $value->angka_kredit;
        }

        $jumlahBidangD += $jumlah;
        $data['penunjangHCount'] = $jumlah;
        $data['penunjangH'] = $penunjangH;

        # I

        $penunjangI = DB::table('penunjang')
            ->where('id_user', '=', $id)
            ->where('kategori', '=', 'I')
            ->get();

        $jumlah = 0;

        foreach ($penunjangI as $key => $value) {
            $jumlah += $value->angka_kredit;
        }

        $jumlahBidangD += $jumlah;
        $data['penunjangICount'] = $jumlah;
        $data['penunjangI'] = $penunjangI;

        # J

        $penunjangJ = DB::table('penunjang')
            ->where('id_user', '=', $id)
            ->where('kategori', '=', 'J')
            ->get();

        $jumlah = 0;

        foreach ($penunjangJ as $key => $value) {
            $jumlah += $value->angka_kredit;
        }

        $jumlahBidangD += $jumlah;
        $data['penunjangJCount'] = $jumlah;
        $data['penunjangJ'] = $penunjangJ;

        $data['jumlahBidangD'] = $jumlahBidangD;

        return $data;
    }
    
}
