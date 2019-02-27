<?php

namespace App\Http\Controllers\PAK;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class BidangACtrl extends Controller {

    public function GetData($id) {

        // return 'GOOD';

                                                                        # PELAKSANAAN PENDIDIKAN

        $jumlahBidangA = 0;

        $pelaksPendidikan = DB::table('pelaksanaan_pendidikan')
        ->orderBy('semester', 'DESC')
        ->where('id_user', '=', $id)
        ->get();

        $pelaksPendidikanCount = DB::table('pelaksanaan_pendidikan')
        ->selectRaw('sum(angka_kredit) as sum')
        ->where('id_user', '=', $id)
        ->get();

        // return $pelaksPendidikanCount;

        $pelaksPendidikanCount = $pelaksPendidikanCount[0]->sum;

        $data['pelaksPendidikanCount'] = $pelaksPendidikanCount;

        $data['pelaksPendidikan'] = $pelaksPendidikan;

        $jumlahBidangA += $pelaksPendidikanCount;

        // return $pelaksPendidikan;

                                                                        # MEMBIMBING SEMINAR

        $bimbinganSeminar = DB::table('bimbingan_seminar')
        ->join('periode', 'periode.id_periode', '=', 'bimbingan_seminar.periode')
        ->where('id_user', '=', $id)
        ->orderBy('semester', 'DESC')
        ->get();

        // return $bimbinganSeminar;
        $bimbinganSeminarCount = DB::table('bimbingan_seminar')
        ->selectRaw('sum(angka_kredit) as sum')
        ->where('id_user', '=', $id)
        ->get();

        $bimbinganSeminarCount = $bimbinganSeminarCount[0]->sum;

        $data['bimbinganSeminarCount'] = $bimbinganSeminarCount;

        $data['bimbinganSeminar'] = $bimbinganSeminar;

        $jumlahBidangA += $bimbinganSeminarCount;

        // return $pelaksPendidikan;

                                                                        # MEMBIMBING KKP

        $bimbinganKkp = DB::table('bimbingan_kkp')
        ->join('periode', 'periode.id_periode', '=', 'bimbingan_kkp.periode')
        ->where('id_user', '=', $id)
        ->orderBy('semester', 'DESC')
        ->get();

        $bimbinganKkpCount = DB::table('bimbingan_kkp')
        ->selectRaw('sum(angka_kredit) as sum')
        ->where('id_user', '=', $id)
        ->get();

        $bimbinganKkpCount = $bimbinganKkpCount[0]->sum;

        $data['bimbinganKkpCount'] = $bimbinganKkpCount;

        $data['bimbinganKkp'] = $bimbinganKkp;

        $jumlahBidangA += $bimbinganKkpCount;

        // return $pelaksPendidikan;

                                                                        # MEMBIMBING UJIAN AKHIR

        $bimbinganLaporanAkhir = DB::table('bimbingan_Laporan_akhir')
        ->join('periode', 'periode.id_periode', '=', 'bimbingan_Laporan_akhir.periode')
        ->where('id_user', '=', $id)
        ->orderBy('semester', 'DESC')
        ->get();

        $bimbinganLaporanAkhirCount = 0;

        foreach ($bimbinganLaporanAkhir as $key => $value) {
            $resultMahasiswa = DB::table('mahasiswa_bimbingan')
            ->where('id_bimbingan_laporan_akhir', '=', $value->id_bimbingan_laporan_akhir)
            ->get();

            $bimbinganLaporanAkhir[$key]->mahasiswa = $resultMahasiswa;

            if ($value->status == 1) {
                $bimbinganLaporanAkhir[$key]->status = 'Selesai';
            }else{
                $bimbinganLaporanAkhir[$key]->status = 'Belum Selesai';
            }

            if ($value->jenis_bimbingan == 'Pembimbing Utama') {
                $bimbinganLaporanAkhir[$key]->jumlah = count($resultMahasiswa);
            }else{
                $bimbinganLaporanAkhir[$key]->jumlah = count($resultMahasiswa) / 2;
            }

            $bimbinganLaporanAkhirCount += $bimbinganLaporanAkhir[$key]->jumlah;
        }

        $data['bimbinganLaporanAkhirCount'] = $bimbinganLaporanAkhirCount;

        $data['bimbinganLaporanAkhir'] = $bimbinganLaporanAkhir;

        $jumlahBidangA += $bimbinganLaporanAkhirCount;

        // return $data;

                                                                        # PENGUJI UJIAN AKHIR

        $penguji = DB::table('penguji_ujian_akhir')
        ->join('periode', 'periode.id_periode', '=', 'penguji_ujian_akhir.periode')
        ->where('id_user', '=', $id)
        ->orderBy('semester', 'DESC')
        ->get();

        $pengujiCount = 0;

        foreach ($penguji as $key => $value) {
            $resultMahasiswa = DB::table('mahasiswa_ujian_akhir')
            ->where('id_penguji_ujian_akhir', '=', $value->id_penguji_ujian_akhir)
            ->get();

            $penguji[$key]->mahasiswa = $resultMahasiswa;

            // if ($value->status == 1) {
            //     $penguji[$key]->status = 'Selesai';
            // }else{
            //     $penguji[$key]->status = 'Belum Selesai';
            // }

            $penguji[$key]->jumlah = count($resultMahasiswa);

            $pengujiCount += $penguji[$key]->jumlah;
        }

        $data['pengujiCount'] = $pengujiCount;

        $data['penguji'] = $penguji;

        $jumlahBidangA += $pengujiCount;

        // return $data;

                                                                        # KEGIATAN MAHASISWA

        $kegiatanMahasiswa = DB::table('kegiatan_mahasiswa')
        ->join('periode', 'periode.id_periode', '=', 'kegiatan_mahasiswa.periode')
        ->where('id_user', '=', $id)
        ->orderBy('semester', 'DESC')
        ->get();

        $data['kegiatanMahasiswaCount'] = count($kegiatanMahasiswa);

        $data['kegiatanMahasiswa'] = $kegiatanMahasiswa;

        $jumlahBidangA += count($kegiatanMahasiswa);

        // return $data;

                                                                       # PROGRAM KULIAH


        $programKuliah = DB::table('program_kuliah')
        ->join('periode', 'periode.id_periode', '=', 'program_kuliah.periode')
        ->where('id_user', '=', $id)
        ->get();

        $jumlah = 0;

        foreach ($programKuliah as $key => $value) {
            $jumlah += $value->volume_kegiatan * 2;
        }

        $data['programKuliahCount'] = $jumlah;

        $data['programKuliah'] = $programKuliah;

        $jumlahBidangA += $jumlah;

        // return $data;

                                                                       # BAHAN PENGAJARAN


        $bahanPengajaran = DB::table('bahan_pengajaran')
        ->where('id_user', '=', $id)
        ->get();

        $jumlah = 0;

        foreach ($bahanPengajaran as $key => $value) {
            $jumlah += $value->volume_kegiatan * 5;
        }

        $data['bahanPengajaranCount'] = $jumlah;

        $data['bahanPengajaran'] = $bahanPengajaran;

        $jumlahBidangA += $jumlah;

        $data['jumlahBidangA'] = $jumlahBidangA;

                                                                       # MENDUDUKI JABATAN PIMPINAN


        $jabatanPimpinan = DB::table('jabatan_pimpinan')
        ->where('id_user', '=', $id)
        ->get();

        $jumlah = 0;

        foreach ($jabatanPimpinan as $key => $value) {
            $jumlah += $value->volume_kegiatan * $value->angka_kredit;
        }

        $jumlahBidangA += $jumlah;

        $data['jabatanPimpinanCount'] = $jumlah;

        $data['jabatanPimpinan'] = $jabatanPimpinan;

                                                                       # KEGIATAN PENGEMBANGAN


        $pengembanganDiri = DB::table('pengembangan_diri')
        ->where('id_user', '=', $id)
        ->get();

        $jumlah = 0;

        foreach ($pengembanganDiri as $key => $value) {
            $jumlah += $value->volume_kegiatan * $value->angka_kredit;
        }

        $data['pengembanganDiriCount'] = $jumlah;

        $data['pengembanganDiri'] = $pengembanganDiri;





        $jumlahBidangA += $jumlah;

        $data['jumlahBidangA'] = $jumlahBidangA;


        return $data;



    }
}

