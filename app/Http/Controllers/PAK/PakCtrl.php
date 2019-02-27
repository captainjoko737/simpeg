<?php

namespace App\Http\Controllers\PAK;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use App\Http\Controllers\PAK\BidangACtrl;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;
use PDF;

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

        foreach ($result as $key => $value) {
            $count = 0;

            $bidangA = (new BidangACtrl)->GetData($value->id_user);
            $count += $bidangA['jumlahBidangA'];

            $bidangC = (new BidangCCtrl)->GetData($value->id_user);
            $count += $bidangC['jumlahBidangC'];

            $bidangD = (new BidangDCtrl)->GetData($value->id_user);
            $count += $bidangD['jumlahBidangD'];

            $result[$key]->angka_kredit = $count;
        }

        $data['result'] = $result;

        if ($user['is_admin'] == 'hidden') {
            $result = DB::table('users')
            ->join('kepegawaian', 'kepegawaian.id_user', '=', 'users.id_user')
            // ->where('id_prodi', '=', $id_prodi)
            ->get();

            foreach ($result as $key => $value) {
                $count = 0;

                $bidangA = (new BidangACtrl)->GetData($value->id_user);
                $count += $bidangA['jumlahBidangA'];

                $bidangC = (new BidangCCtrl)->GetData($value->id_user);
                $count += $bidangC['jumlahBidangC'];

                $bidangD = (new BidangDCtrl)->GetData($value->id_user);
                $count += $bidangD['jumlahBidangD'];

                $result[$key]->angka_kredit = $count;
            }

            $data['result'] = $result;
        }

        return view('PAK.index', $data);
    }

    public function detailDosen($id) {
        
        $data['title'] = 'Layanan PAK';
        
        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $pendidikanFormal = DB::table('pendidikan_formal')
        ->where('id_user', '=', $id)
        ->get();

        $dataDosen = DB::table('users')
        ->where('users.id_user', '=', $id)
        ->join('kepegawaian', 'kepegawaian.id_user', '=', 'users.id_user')
        ->select('users.nama', 'kepegawaian.nip')
        ->get();

        $pangkat = DB::table('kepangkatan')
        ->where('id_user', '=', $id)
        ->orderBy('id_kepangkatan', 'DESC')
        ->select('golongan_pangkat')
        ->get();

        $dataDosen[0]->pangkat = $pangkat[0]->golongan_pangkat;

        $jabatan_fungsional = DB::table('jabatan_fungsional')
        ->where('id_user', '=', $id)
        ->orderBy('id_jabatan_fungsional', 'DESC')
        ->select('jabatan_fungsional')
        ->get();

        $dataDosen[0]->jabatan_fungsional = $jabatan_fungsional[0]->jabatan_fungsional;

        $dataDosen[0]->id_user = (int)$id;
        // return $dataDosen;

        $data['data_dosen'] = $dataDosen[0];
        $data['pendidikanFormal'] = $pendidikanFormal;

        $penanggung = DB::table('penanggung_jawab')
        ->where('id_penanggung_jawab', '=', 1)
        ->get();

        $data['penanggung'] = $penanggung[0];
        

                                                                   # PELAKSANAAN PENDIDIKAN

        $bidangA = (new BidangACtrl)->GetData($id); 

        $data['bahanPengajaranCount'] = $bidangA['bahanPengajaranCount'];
        $data['bahanPengajaran'] = $bidangA['bahanPengajaran']; 
        $data['pelaksPendidikan'] = $bidangA['pelaksPendidikan']; 
        $data['pelaksPendidikanCount'] = $bidangA['pelaksPendidikanCount'];
        $data['bimbinganSeminarCount'] = $bidangA['bimbinganSeminarCount'];
        $data['bimbinganSeminar'] = $bidangA['bimbinganSeminar'];
        $data['bimbinganKkpCount'] = $bidangA['bimbinganKkpCount'];
        $data['bimbinganKkp'] = $bidangA['bimbinganKkp'];
        $data['bimbinganLaporanAkhirCount'] = $bidangA['bimbinganLaporanAkhirCount'];
        $data['bimbinganLaporanAkhir'] = $bidangA['bimbinganLaporanAkhir'];
        $data['pengujiCount'] = $bidangA['pengujiCount'];
        $data['penguji'] = $bidangA['penguji'];
        $data['programKuliahCount'] = $bidangA['programKuliahCount'];
        $data['programKuliah'] = $bidangA['programKuliah'];
        $data['kegiatanMahasiswaCount'] = $bidangA['kegiatanMahasiswaCount'];
        $data['kegiatanMahasiswa'] = $bidangA['kegiatanMahasiswa'];
        $data['jabatanPimpinanCount'] = $bidangA['jabatanPimpinanCount'];
        $data['jabatanPimpinan'] = $bidangA['jabatanPimpinan'];
        $data['pengembanganDiriCount'] = $bidangA['pengembanganDiriCount'];
        $data['pengembanganDiri'] = $bidangA['pengembanganDiri'];


        $data['jumlahBidangA'] = $bidangA['jumlahBidangA'];


                                                                   # PENELITIAN

        $bidangB = (new BidangBCtrl)->GetData($id);

        $data['penelitianA1Count'] = $bidangB['penelitianA1Count'];
        $data['penelitianA1'] = $bidangB['penelitianA1'];
        $data['penelitianA2Count'] = $bidangB['penelitianA2Count'];
        $data['penelitianA2'] = $bidangB['penelitianA2'];
        $data['penelitianBCount'] = $bidangB['penelitianBCount'];
        $data['penelitianB'] = $bidangB['penelitianB'];
        $data['penelitianCCount'] = $bidangB['penelitianCCount'];
        $data['penelitianC'] = $bidangB['penelitianC'];
        $data['penelitianDCount'] = $bidangB['penelitianDCount'];
        $data['penelitianD'] = $bidangB['penelitianD'];
        $data['penelitianECount'] = $bidangB['penelitianECount'];
        $data['penelitianE'] = $bidangB['penelitianE'];
        $data['jumlahBidangB'] = $bidangB['jumlahBidangB'];

        // return $data;

                                                                   # PENGABDIAN

        $bidangC = (new BidangCCtrl)->GetData($id);

        $data['pengabdianACount'] = $bidangC['pengabdianACount'];
        $data['pengabdianA'] = $bidangC['pengabdianA'];
        $data['pengabdianBCount'] = $bidangC['pengabdianBCount'];
        $data['pengabdianB'] = $bidangC['pengabdianB'];
        $data['pengabdianCCount'] = $bidangC['pengabdianCCount'];
        $data['pengabdianC'] = $bidangC['pengabdianC'];
        $data['pengabdianDCount'] = $bidangC['pengabdianDCount'];
        $data['pengabdianD'] = $bidangC['pengabdianD'];
        $data['pengabdianECount'] = $bidangC['pengabdianECount'];
        $data['pengabdianE'] = $bidangC['pengabdianE'];
        $data['jumlahBidangC'] = $bidangC['jumlahBidangC'];

        // return $data;

                                                                    # PENUNJANG

        $bidangD = (new BidangDCtrl)->GetData($id);

        $data['penunjangACount'] = $bidangD['penunjangACount'];
        $data['penunjangA'] = $bidangD['penunjangA'];
        $data['penunjangBCount'] = $bidangD['penunjangBCount'];
        $data['penunjangB'] = $bidangD['penunjangB'];
        $data['penunjangCCount'] = $bidangD['penunjangCCount'];
        $data['penunjangC'] = $bidangD['penunjangC'];
        $data['penunjangDCount'] = $bidangD['penunjangDCount'];
        $data['penunjangD'] = $bidangD['penunjangD'];
        $data['penunjangECount'] = $bidangD['penunjangECount'];
        $data['penunjangE'] = $bidangD['penunjangE'];
        $data['penunjangFCount'] = $bidangD['penunjangFCount'];
        $data['penunjangF'] = $bidangD['penunjangF'];
        $data['penunjangGCount'] = $bidangD['penunjangGCount'];
        $data['penunjangG'] = $bidangD['penunjangG'];
        $data['penunjangHCount'] = $bidangD['penunjangHCount'];
        $data['penunjangH'] = $bidangD['penunjangH'];
        $data['penunjangICount'] = $bidangD['penunjangICount'];
        $data['penunjangI'] = $bidangD['penunjangI'];
        $data['penunjangJCount'] = $bidangD['penunjangJCount'];
        $data['penunjangJ'] = $bidangD['penunjangJ']; 
        $data['jumlahBidangD'] = $bidangD['jumlahBidangD'];

        // return $data;

        return view('PAK.detail', $data);
    }

    public function Aprints($id, $nama, $nip, $pangkat, $jabatan_fungsional, $unit, $tgl_cetak, $jabatan_struktural) {

        $data_penanggung = [
            'nama'               => $nama,
            'nip'                => $nip,
            'pangkat'            => str_replace('*', '/', $pangkat),
            'jabatan_fungsional' => $jabatan_fungsional,
            'unit'               => $unit,
            'tanggal_cetak'      => $tgl_cetak,
            'jabatan_struktural' => $jabatan_struktural
        ];

        $data['data_penanggung'] = $data_penanggung;
        // return $data_penanggung;

        $pendidikanFormal = DB::table('pendidikan_formal')
        ->where('id_user', '=', $id)
        ->get();
        $data['pendidikanFormal'] = $pendidikanFormal;

        // return $pendidikanFormal;

        $dataDosen = DB::table('users')
        ->where('users.id_user', '=', $id)
        ->join('kepegawaian', 'kepegawaian.id_user', '=', 'users.id_user')
        ->select('users.nama', 'kepegawaian.nip', 'kepegawaian.nidn')
        ->get();

        $pangkat = DB::table('kepangkatan')
        ->where('id_user', '=', $id)
        ->orderBy('id_kepangkatan', 'DESC')
        ->select('golongan_pangkat')
        ->get();

        $dataDosen[0]->pangkat = $pangkat[0]->golongan_pangkat;

        $jabatan_fungsional = DB::table('jabatan_fungsional')
        ->where('id_user', '=', $id)
        ->orderBy('id_jabatan_fungsional', 'DESC')
        ->select('jabatan_fungsional')
        ->get();

        $dataDosen[0]->jabatan_fungsional = $jabatan_fungsional[0]->jabatan_fungsional;

        $data['data_dosen'] = $dataDosen[0];

                                                                       # PELAKSANAAN PENDIDIKAN

        $bidangA = (new BidangACtrl)->GetData($id); 

        $data['bahanPengajaranCount'] = $bidangA['bahanPengajaranCount'];
        $data['bahanPengajaran'] = $bidangA['bahanPengajaran']; 
        $data['pelaksPendidikan'] = $bidangA['pelaksPendidikan']; 
        $data['pelaksPendidikanCount'] = $bidangA['pelaksPendidikanCount'];
        $data['bimbinganSeminarCount'] = $bidangA['bimbinganSeminarCount'];
        $data['bimbinganSeminar'] = $bidangA['bimbinganSeminar'];
        $data['bimbinganKkpCount'] = $bidangA['bimbinganKkpCount'];
        $data['bimbinganKkp'] = $bidangA['bimbinganKkp'];
        $data['bimbinganLaporanAkhirCount'] = $bidangA['bimbinganLaporanAkhirCount'];
        $data['bimbinganLaporanAkhir'] = $bidangA['bimbinganLaporanAkhir'];
        $data['pengujiCount'] = $bidangA['pengujiCount'];
        $data['penguji'] = $bidangA['penguji'];
        $data['programKuliahCount'] = $bidangA['programKuliahCount'];
        $data['programKuliah'] = $bidangA['programKuliah'];
        $data['kegiatanMahasiswaCount'] = $bidangA['kegiatanMahasiswaCount'];
        $data['kegiatanMahasiswa'] = $bidangA['kegiatanMahasiswa'];
        $data['jabatanPimpinanCount'] = $bidangA['jabatanPimpinanCount'];
        $data['jabatanPimpinan'] = $bidangA['jabatanPimpinan'];
        $data['pengembanganDiriCount'] = $bidangA['pengembanganDiriCount'];
        $data['pengembanganDiri'] = $bidangA['pengembanganDiri'];

        $data['jumlahBidangA'] = $bidangA['jumlahBidangA'];

        $pdf = PDF::loadView('PAK.Apdfview', $data);
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('PAK.Apdfview.pdf');
    }

    public function Bprints($id, $nama, $nip, $pangkat, $jabatan_fungsional, $unit, $tgl_cetak, $jabatan_struktural) {

        $data_penanggung = [
            'nama'               => $nama,
            'nip'                => $nip,
            'pangkat'            => str_replace('*', '/', $pangkat),
            'jabatan_fungsional' => $jabatan_fungsional,
            'unit'               => $unit,
            'tanggal_cetak'      => $tgl_cetak,
            'jabatan_struktural' => $jabatan_struktural
        ];

        $data['data_penanggung'] = $data_penanggung;
        // return $data_penanggung;

        $pendidikanFormal = DB::table('pendidikan_formal')
        ->where('id_user', '=', $id)
        ->get();
        $data['pendidikanFormal'] = $pendidikanFormal;

        // return $pendidikanFormal;

        $dataDosen = DB::table('users')
        ->where('users.id_user', '=', $id)
        ->join('kepegawaian', 'kepegawaian.id_user', '=', 'users.id_user')
        ->select('users.nama', 'kepegawaian.nip', 'kepegawaian.nidn')
        ->get();

        $pangkat = DB::table('kepangkatan')
        ->where('id_user', '=', $id)
        ->orderBy('id_kepangkatan', 'DESC')
        ->select('golongan_pangkat')
        ->get();

        $dataDosen[0]->pangkat = $pangkat[0]->golongan_pangkat;

        $jabatan_fungsional = DB::table('jabatan_fungsional')
        ->where('id_user', '=', $id)
        ->orderBy('id_jabatan_fungsional', 'DESC')
        ->select('jabatan_fungsional')
        ->get();

        $dataDosen[0]->jabatan_fungsional = $jabatan_fungsional[0]->jabatan_fungsional;

        $data['data_dosen'] = $dataDosen[0];

                                                                       # PENELITIAN

        $bidangB = (new BidangBCtrl)->GetData($id);

        $data['penelitianA1Count'] = $bidangB['penelitianA1Count'];
        $data['penelitianA1'] = $bidangB['penelitianA1'];
        $data['penelitianA2Count'] = $bidangB['penelitianA2Count'];
        $data['penelitianA2'] = $bidangB['penelitianA2'];
        $data['penelitianBCount'] = $bidangB['penelitianBCount'];
        $data['penelitianB'] = $bidangB['penelitianB'];
        $data['penelitianCCount'] = $bidangB['penelitianCCount'];
        $data['penelitianC'] = $bidangB['penelitianC'];
        $data['penelitianDCount'] = $bidangB['penelitianDCount'];
        $data['penelitianD'] = $bidangB['penelitianD'];
        $data['penelitianECount'] = $bidangB['penelitianECount'];
        $data['penelitianE'] = $bidangB['penelitianE'];
        $data['jumlahBidangB'] = $bidangB['jumlahBidangB'];

        $pdf = PDF::loadView('PAK.Bpdfview', $data);
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('PAK.Bpdfview.pdf');
    }

    public function Cprints($id, $nama, $nip, $pangkat, $jabatan_fungsional, $unit, $tgl_cetak, $jabatan_struktural) {
        // return 'GOOD';

        $data_penanggung = [
            'nama'               => $nama,
            'nip'                => $nip,
            'pangkat'            => str_replace('*', '/', $pangkat),
            'jabatan_fungsional' => $jabatan_fungsional,
            'unit'               => $unit,
            'tanggal_cetak'      => $tgl_cetak,
            'jabatan_struktural' => $jabatan_struktural
        ];

        $data['data_penanggung'] = $data_penanggung;
        // return $data_penanggung;

        $dataDosen = DB::table('users')
        ->where('users.id_user', '=', $id)
        ->join('kepegawaian', 'kepegawaian.id_user', '=', 'users.id_user')
        ->select('users.nama', 'kepegawaian.nip')
        ->get();

        $pangkat = DB::table('kepangkatan')
        ->where('id_user', '=', $id)
        ->orderBy('id_kepangkatan', 'DESC')
        ->select('golongan_pangkat')
        ->get();

        $dataDosen[0]->pangkat = $pangkat[0]->golongan_pangkat;

        $jabatan_fungsional = DB::table('jabatan_fungsional')
        ->where('id_user', '=', $id)
        ->orderBy('id_jabatan_fungsional', 'DESC')
        ->select('jabatan_fungsional')
        ->get();

        $dataDosen[0]->jabatan_fungsional = $jabatan_fungsional[0]->jabatan_fungsional;

        // return $dataDosen;

        $data['data_dosen'] = $dataDosen[0];

                                                                       # PENGABDIAN

        $bidangC = (new BidangCCtrl)->GetData($id);

        $data['pengabdianACount'] = $bidangC['pengabdianACount'];
        $data['pengabdianA'] = $bidangC['pengabdianA'];
        $data['pengabdianBCount'] = $bidangC['pengabdianBCount'];
        $data['pengabdianB'] = $bidangC['pengabdianB'];
        $data['pengabdianCCount'] = $bidangC['pengabdianCCount'];
        $data['pengabdianC'] = $bidangC['pengabdianC'];
        $data['pengabdianDCount'] = $bidangC['pengabdianDCount'];
        $data['pengabdianD'] = $bidangC['pengabdianD'];
        $data['pengabdianECount'] = $bidangC['pengabdianECount'];
        $data['pengabdianE'] = $bidangC['pengabdianE'];
        $data['jumlahBidangC'] = $bidangC['jumlahBidangC'];

        $pdf = PDF::loadView('PAK.Cpdfview', $data);
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('PAK.Cpdfview.pdf');
    }

    public function Dprints($id, $nama, $nip, $pangkat, $jabatan_fungsional, $unit, $tgl_cetak, $jabatan_struktural) {
        // return 'GOOD';
        

            // return $items;
        // view()->share('KHS',$items);

        $data_penanggung = [
            'nama'               => $nama,
            'nip'                => $nip,
            'pangkat'            => str_replace('*', '/', $pangkat),
            'jabatan_fungsional' => $jabatan_fungsional,
            'unit'               => $unit,
            'tanggal_cetak'      => $tgl_cetak,
            'jabatan_struktural' => $jabatan_struktural
        ];

        $data['data_penanggung'] = $data_penanggung;
        // return $data_penanggung;

        $dataDosen = DB::table('users')
        ->where('users.id_user', '=', $id)
        ->join('kepegawaian', 'kepegawaian.id_user', '=', 'users.id_user')
        ->select('users.nama', 'kepegawaian.nip')
        ->get();

        $pangkat = DB::table('kepangkatan')
        ->where('id_user', '=', $id)
        ->orderBy('id_kepangkatan', 'DESC')
        ->select('golongan_pangkat')
        ->get();

        $dataDosen[0]->pangkat = $pangkat[0]->golongan_pangkat;

        $jabatan_fungsional = DB::table('jabatan_fungsional')
        ->where('id_user', '=', $id)
        ->orderBy('id_jabatan_fungsional', 'DESC')
        ->select('jabatan_fungsional')
        ->get();

        $dataDosen[0]->jabatan_fungsional = $jabatan_fungsional[0]->jabatan_fungsional;

        // return $dataDosen;

        $data['data_dosen'] = $dataDosen[0];

                                                                       # PENUNJANG

        $bidangD = (new BidangDCtrl)->GetData($id);

        $data['penunjangACount'] = $bidangD['penunjangACount'];
        $data['penunjangA'] = $bidangD['penunjangA'];
        $data['penunjangBCount'] = $bidangD['penunjangBCount'];
        $data['penunjangB'] = $bidangD['penunjangB'];
        $data['penunjangCCount'] = $bidangD['penunjangCCount'];
        $data['penunjangC'] = $bidangD['penunjangC'];
        $data['penunjangDCount'] = $bidangD['penunjangDCount'];
        $data['penunjangD'] = $bidangD['penunjangD'];
        $data['penunjangECount'] = $bidangD['penunjangECount'];
        $data['penunjangE'] = $bidangD['penunjangE'];
        $data['penunjangFCount'] = $bidangD['penunjangFCount'];
        $data['penunjangF'] = $bidangD['penunjangF'];
        $data['penunjangGCount'] = $bidangD['penunjangGCount'];
        $data['penunjangG'] = $bidangD['penunjangG'];
        $data['penunjangHCount'] = $bidangD['penunjangHCount'];
        $data['penunjangH'] = $bidangD['penunjangH'];
        $data['penunjangICount'] = $bidangD['penunjangICount'];
        $data['penunjangI'] = $bidangD['penunjangI'];
        $data['penunjangJCount'] = $bidangD['penunjangJCount'];
        $data['penunjangJ'] = $bidangD['penunjangJ']; 
        $data['jumlahBidangD'] = $bidangD['jumlahBidangD'];

        

        $pdf = PDF::loadView('PAK.Dpdfview', $data);
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('PAK.Dpdfview.pdf');
    }

    public function penanggung() {

        $data['title'] = 'Penanggung Jawab PAK';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_prodi = Auth::user()->id_prodi;

        $penanggung = DB::table('penanggung_jawab')
        ->where('id_penanggung_jawab', '=', 1)
        ->get();

        $data['penanggung'] = $penanggung[0];

        return view('PAK.penanggung.edit', $data);
    }

    public function updatePenanggung(request $request) {

        $save = DB::table('penanggung_jawab')
            ->where('id_penanggung_jawab', 1)
            ->update([
                'nama' => $request->nama,
                'nip' => $request->nip,
                'pangkat' => $request->pangkat,
                'jabatan_fungsional' => $request->jabatan_fungsional,
                'unit_kerja' => $request->unit_kerja,
        ]);

        return redirect('/PAK');
    }

}



