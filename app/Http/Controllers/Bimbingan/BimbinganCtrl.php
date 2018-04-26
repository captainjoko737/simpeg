<?php

namespace App\Http\Controllers\bimbingan;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\MBimbingan;
use DB;

class BimbinganCtrl extends Controller {
   
   public function bimbinganSeminar() {

        $data['title'] = 'Bimbingan Seminar';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        $result = DB::table('bimbingan_seminar')
        ->where('id_user', '=', $id_user)
        ->join('periode', 'periode.id_periode', '=', 'bimbingan_seminar.periode')
        ->orderBy('id_bimbingan_seminar', 'DESC')
        ->get();

        foreach ($result as $key => $value) {
            if ($value->semester == 1) {
                $result[$key]->semester = 'Ganjil';
            }else{
                $result[$key]->semester = 'Genap';
            }
        }

        $data['result'] = $result;

        return view('bimbingan.seminar', $data);
   }

   public function addSeminar() {

        $data['title'] = 'Tambah Bimbingan Seminar';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        $periode = DB::table('periode')
        ->get();
        
        $data['periode'] = $periode;

        return view('bimbingan.addSeminar', $data);
    }

    public function CreateSeminar(request $request) {

            if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;
                $request['angka_kredit'] = $request['jumlah_sks'];

                $save = DB::table('bimbingan_seminar')->insert(
                    [
                        'id_user' => $request->id_user, 
                        'periode' => $request->periode,
                        'nama_bimbingan' => $request->nama_bimbingan,
                        'semester' => $request->semester,
                        'jumlah_sks' => $request->jumlah_sks,
                        'angka_kredit' => $request->angka_kredit,
                        'bukti_fisik' => $request->bukti_fisik
                    ]
                );

                if ($save) {
                    if ($request->file) {
                        $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                    }
                }
            }

            return redirect('/bimbingan/seminar');
    }

    public function editSeminar($id_bimbingan_seminar) {

        $data['title'] = 'Edit Pelaksanaan Pendidikan';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('bimbingan_seminar')
        ->join('periode', 'periode.id_periode', '=', 'bimbingan_seminar.periode')
        ->where('bimbingan_seminar.id_bimbingan_seminar', '=', $id_bimbingan_seminar)
        ->get();

        $periode = DB::table('periode')
        ->get();
        
        $data['periode'] = $periode;

        $data['result'] = $result[0];
        $data['id_user'] = $id_user;

        return view('bimbingan.editSeminar', $data);
    }

    public function saveSeminar(request $request) {

        if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;
                $request['angka_kredit'] = $request['jumlah_sks'];

                $save = DB::table('bimbingan_seminar')
                            ->where('id_bimbingan_seminar', $request->id_bimbingan_seminar)
                            ->update([
                                'periode' => $request->periode,
                                'nama_bimbingan' => $request->nama_bimbingan,
                                'semester' => $request->semester,
                                'jumlah_sks' => $request->jumlah_sks,
                                'angka_kredit' => $request->angka_kredit,
                                'bukti_fisik' => $request->bukti_fisik
                            ]);

                if ($save) {
                    if ($request->file) {
                        $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                    }
                }
            }else{
                $request['angka_kredit'] = $request['jumlah_sks'];

                $save = DB::table('bimbingan_seminar')
                            ->where('id_bimbingan_seminar', $request->id_bimbingan_seminar)
                            ->update([
                                'periode' => $request->periode,
                                'nama_bimbingan' => $request->nama_bimbingan,
                                'semester' => $request->semester,
                                'jumlah_sks' => $request->jumlah_sks,
                                'angka_kredit' => $request->angka_kredit
                        ]);
            }

        return redirect('/bimbingan/seminar');

    }

    public function deleteSeminar(request $request) {

        // $result = MPelaksanaanPendidikan::find($request->id_bimbingan_seminar);

        $success = DB::table('bimbingan_seminar')->where('id_bimbingan_seminar', '=', $request->id_bimbingan_seminar)->delete();

    }








    # - - - - - - - - - - - - - - - - - - - - - - - - - - KKP - - - - - - - - - - - - - - - - - - - - - #

    public function bimbinganKkp() {

        $data['title'] = 'Bimbingan KKP';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        $result = DB::table('bimbingan_kkp')
        ->where('id_user', '=', $id_user)
        ->join('periode', 'periode.id_periode', '=', 'bimbingan_kkp.periode')
        ->orderBy('id_bimbingan_kkp', 'DESC')
        ->get();

        foreach ($result as $key => $value) {
            if ($value->semester == 1) {
                $result[$key]->semester = 'Ganjil';
            }else{
                $result[$key]->semester = 'Genap';
            }
        }

        $data['result'] = $result;

        return view('bimbingan.kkp', $data);
   }

   public function addKkp() {

        $data['title'] = 'Tambah Bimbingan KKP';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        $periode = DB::table('periode')
        ->get();
        
        $data['periode'] = $periode;

        return view('bimbingan.addKkp', $data);
    }

    public function CreateKkp(request $request) {

            if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;
                $request['angka_kredit'] = $request['jumlah_sks'];

                $save = DB::table('bimbingan_kkp')->insert(
                    [
                        'id_user' => $request->id_user, 
                        'periode' => $request->periode,
                        'nama_bimbingan' => $request->nama_bimbingan,
                        'semester' => $request->semester,
                        'jumlah_sks' => $request->jumlah_sks,
                        'angka_kredit' => $request->angka_kredit,
                        'bukti_fisik' => $request->bukti_fisik
                    ]
                );

                if ($save) {
                    if ($request->file) {
                        $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                    }
                }
            }

            return redirect('/bimbingan/kkp');
    }

    public function editKkp($id_bimbingan_kkp) {

        $data['title'] = 'Edit Pelaksanaan Pendidikan';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('bimbingan_kkp')
        ->join('periode', 'periode.id_periode', '=', 'bimbingan_kkp.periode')
        ->where('bimbingan_kkp.id_bimbingan_kkp', '=', $id_bimbingan_kkp)
        ->get();

        $periode = DB::table('periode')
        ->get();
        
        $data['periode'] = $periode;

        $data['result'] = $result[0];
        $data['id_user'] = $id_user;

        return view('bimbingan.editKkp', $data);
    }

    public function saveKkp(request $request) {

        if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;
                $request['angka_kredit'] = $request['jumlah_sks'];

                $save = DB::table('bimbingan_kkp')
                            ->where('id_bimbingan_kkp', $request->id_bimbingan_kkp)
                            ->update([
                                'periode' => $request->periode,
                                'nama_bimbingan' => $request->nama_bimbingan,
                                'semester' => $request->semester,
                                'jumlah_sks' => $request->jumlah_sks,
                                'angka_kredit' => $request->angka_kredit,
                                'bukti_fisik' => $request->bukti_fisik
                            ]);

                if ($save) {
                    if ($request->file) {
                        $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                    }
                }
            }else{
                $request['angka_kredit'] = $request['jumlah_sks'];

                $save = DB::table('bimbingan_kkp')
                            ->where('id_bimbingan_kkp', $request->id_bimbingan_kkp)
                            ->update([
                                'periode' => $request->periode,
                                'nama_bimbingan' => $request->nama_bimbingan,
                                'semester' => $request->semester,
                                'jumlah_sks' => $request->jumlah_sks,
                                'angka_kredit' => $request->angka_kredit
                        ]);
            }

        return redirect('/bimbingan/kkp');

    }

    public function deleteKkp(request $request) {

        $success = DB::table('bimbingan_seminar')->where('id_bimbingan_seminar', '=', $request->id_bimbingan_seminar)->delete();

    }





    # - - - - - - - - - - - - - - - - - - - - - - - - - - LAPORAN AKHIR - - - - - - - - - - - - - - - - - - - - - #

    public function bimbinganLaporanAkhir() {

        $data['title'] = 'Bimbingan Laporan Akhir';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('bimbingan_laporan_akhir')
        ->where('id_user', '=', $id_user)
        ->join('periode', 'periode.id_periode', '=', 'bimbingan_laporan_akhir.periode')
        ->orderBy('bimbingan_laporan_akhir.id_bimbingan_laporan_akhir', 'DESC')
        ->get();

        foreach ($result as $key => $value) {
            if ($value->semester == 1) {
                $result[$key]->semester = 'Ganjil';
            }else{
                $result[$key]->semester = 'Genap';
            }

            if ($value->status == 1) {
                $result[$key]->status = 'Selesai';
            }else{
                $result[$key]->status = 'Belum Selesai';
            }

            $countMahasiswa = DB::table('mahasiswa_bimbingan')
              ->where('id_bimbingan_laporan_akhir', '=', $value->id_bimbingan_laporan_akhir)
              
              ->count();

            $result[$key]->angka_kredit = $countMahasiswa;
        }

        $data['result'] = $result;
        // session()->flash('message', 'Laporan anda telah berhasil di tambahkan');

        return view('bimbingan.laporanAkhir', $data);
   }

   public function detailLaporanAkhir($id_bimbingan_laporan_akhir) {
        // return $id;
        $data['title'] = 'Detail Bimbingan Laporan Akhir';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $result = DB::table('bimbingan_laporan_akhir')
        ->where('id_bimbingan_laporan_akhir', '=', $id_bimbingan_laporan_akhir)
        ->join('periode', 'periode.id_periode', '=', 'bimbingan_laporan_akhir.periode')
        ->get();

        $mahasiswa = DB::table('mahasiswa_bimbingan')
        ->where('id_bimbingan_laporan_akhir', '=', $id_bimbingan_laporan_akhir)
        ->get();

        foreach ($result as $key => $value) {
            if ($value->semester == 1) {
                $result[$key]->semester = 'Ganjil';
            }else{
                $result[$key]->semester = 'Genap';
            }
        }

        $data['result'] = $result[0];
        $data['mahasiswa'] = $mahasiswa;

        // return $data;


        return view('bimbingan.detailLaporanAkhir', $data);
   }

   public function addLaporanAkhir() {

        $data['title'] = 'Tambah Bimbingan Laporan Akhir';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        $periode = DB::table('periode')
        ->get();
        
        $data['periode'] = $periode;

        return view('bimbingan.addLaporanAkhir', $data);
    }

    public function CreateLaporanAkhir(request $request) {

      $result = DB::table('bimbingan_laporan_akhir')
      ->where('periode', '=', $request->periode)
      ->where('jenis_bimbingan', '=', $request->jenis_bimbingan)
      ->where('semester', '=', $request->semester)
      ->get();

      if ($result == []) {
          $save = DB::table('bimbingan_laporan_akhir')->insert(
                    [
                        'id_user' => $request->id_user, 
                        'periode' => $request->periode,
                        'jenis_bimbingan' => $request->jenis_bimbingan,
                        'semester' => $request->semester
                    ]
                );
          if ($save) {
            session()->flash('message', 'Data Berhasil dibuat');
            return redirect('/bimbingan/laporanAkhir');
          }else{
            session()->flash('error', 'Terjadi Kesalahan');
            return redirect('/bimbingan/laporanAkhir');
          }
      }else{
          session()->flash('error', 'Jenis Bimbingan, Periode dan Semester Sudah dibuat');
          return redirect('/bimbingan/laporanAkhir');
      }

    }

    public function editLaporanAkhir($id_bimbingan_laporan_akhir) {

        $data['title'] = 'Edit Bimbingan Laporan Akhir';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('bimbingan_laporan_akhir')
        ->join('periode', 'periode.id_periode', '=', 'bimbingan_laporan_akhir.periode')
        ->where('bimbingan_laporan_akhir.id_bimbingan_laporan_akhir', '=', $id_bimbingan_laporan_akhir)
        ->get();

        $periode = DB::table('periode')
        ->get();
        
        $data['periode'] = $periode;

        $data['result'] = $result[0];
        $data['id_user'] = $id_user;

        return view('bimbingan.editLaporanAkhir', $data);
    }

    public function saveLaporanAkhir(request $request) {

        $result = DB::table('bimbingan_laporan_akhir')
        ->where('periode', '=', $request->periode)
        ->where('jenis_bimbingan', '=', $request->jenis_bimbingan)
        ->where('semester', '=', $request->semester)
        ->get();

        if ($result == []) {

            $save = DB::table('bimbingan_laporan_akhir')
                            ->where('id_bimbingan_laporan_akhir', $request->id_bimbingan_laporan_akhir)
                            ->update([
                                'id_user' => $request->id_user, 
                                'periode' => $request->periode,
                                'jenis_bimbingan' => $request->jenis_bimbingan,
                                'semester' => $request->semester
                            ]);

            if ($save) {
              session()->flash('message', 'Data Berhasil dibuat');
              return redirect('/bimbingan/laporanAkhir');
            }else{
              session()->flash('error', 'Terjadi Kesalahan');
              return redirect('/bimbingan/laporanAkhir');
            }
        }else{
            session()->flash('error', 'Jenis Bimbingan, Periode dan Semester Sudah pernah dibuat');
            return redirect('/bimbingan/laporanAkhir');
        }

    }

    public function deleteLaporanAkhir(request $request) {

        $success = DB::table('bimbingan_laporan_akhir')->where('id_bimbingan_laporan_akhir', '=', $request->id_bimbingan_laporan_akhir)->delete();

    }

    public function addLaporanAkhirDetail() {

        $data['title'] = 'Tambah Mahasiswa Bimbingan Laporan Akhir';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        $periode = DB::table('periode')
        ->get();
        
        $data['periode'] = $periode;

        return view('bimbingan.addLaporanAkhirDetail', $data);
    }

    public function CreateLaporanAkhirDetail(request $request) {

      $result = DB::table('bimbingan_laporan_akhir')
      ->where('periode', '=', $request->periode)
      ->where('jenis_bimbingan', '=', $request->jenis_bimbingan)
      ->where('semester', '=', $request->semester)
      ->get();

      if ($result == []) {
          $save = DB::table('bimbingan_laporan_akhir')->insert(
                    [
                        'id_user' => $request->id_user, 
                        'periode' => $request->periode,
                        'jenis_bimbingan' => $request->jenis_bimbingan,
                        'semester' => $request->semester
                    ]
                );
          if ($save) {
            session()->flash('message', 'Data Berhasil dibuat');
            return redirect('/bimbingan/laporanAkhir');
          }else{
            session()->flash('error', 'Terjadi Kesalahan');
            return redirect('/bimbingan/laporanAkhir');
          }
      }else{
          session()->flash('error', 'Jenis Bimbingan, Periode dan Semester Sudah dibuat');
          return redirect('/bimbingan/laporanAkhir');
      }

    }



}
