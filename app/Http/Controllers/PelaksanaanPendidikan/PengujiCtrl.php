<?php

namespace App\Http\Controllers\PelaksanaanPendidikan;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\MBimbingan;
use DB;

class PengujiCtrl extends Controller {
    
    public function pengujiUjianAkhir() {

        $data['title'] = 'Penguji Ujian Akhir';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('penguji_ujian_akhir')
        ->where('id_user', '=', $id_user)
        ->join('periode', 'periode.id_periode', '=', 'penguji_ujian_akhir.periode')
        ->orderBy('penguji_ujian_akhir.id_penguji_ujian_akhir', 'DESC')
        ->get();

        foreach ($result as $key => $value) {
            if ($value->semester == 1) {
                $result[$key]->semester = 'Ganjil';
            }else{
                $result[$key]->semester = 'Genap';
            }

            $countMahasiswa = DB::table('mahasiswa_ujian_akhir')
              ->where('id_penguji_ujian_akhir', '=', $value->id_penguji_ujian_akhir)
              
              ->count();

            $result[$key]->angka_kredit = $countMahasiswa;
            
        }

        $data['result'] = $result;
        // session()->flash('message', 'Laporan anda telah berhasil di tambahkan');

        return view('pengujian.index', $data);
   }

   public function add() {

        $data['title'] = 'Tambah Penguji Ujian Akhir';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        $periode = DB::table('periode')
        ->get();
        
        $data['periode'] = $periode;

        return view('pengujian.add', $data);
    }

    public function Create(request $request) {

        $result = DB::table('penguji_ujian_akhir')
        ->where('periode', '=', $request->periode)
        ->where('semester', '=', $request->semester)
        ->get();

        // return $result;

        if ($result == []) {
                $save = DB::table('penguji_ujian_akhir')->insert(
                    [
                        'id_user' => $request->id_user, 
                        'periode' => $request->periode,
                        'semester' => $request->semester
                    ]
                );
            if ($save) {
                session()->flash('message', 'Data Berhasil dibuat');
                return redirect('/pengujian');
            }else{
                session()->flash('error', 'Terjadi Kesalahan');
                return redirect('/pengujian');
            }
        }else{
          session()->flash('error', 'Periode dan Semester Sudah pernah dibuat');
          return redirect('/pengujian');
        }

    }

    public function edit($id_penguji_ujian_akhir) {

        $data['title'] = 'Edit Penguji Ujian Akhir';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('penguji_ujian_akhir')
        ->join('periode', 'periode.id_periode', '=', 'penguji_ujian_akhir.periode')
        ->where('penguji_ujian_akhir.id_penguji_ujian_akhir', '=', $id_penguji_ujian_akhir)
        ->get();

        $periode = DB::table('periode')
        ->get();
        
        $data['periode'] = $periode;

        $data['result'] = $result[0];
        $data['id_user'] = $id_user;

        return view('pengujian.edit', $data);
    }

    public function save(request $request) {

        $result = DB::table('penguji_ujian_akhir')
        ->where('periode', '=', $request->periode)
        ->where('semester', '=', $request->semester)
        ->get();

        if ($result == []) {

            $save = DB::table('penguji_ujian_akhir')
                            ->where('id_penguji_ujian_akhir', $request->id_penguji_ujian_akhir)
                            ->update([
                                'id_user' => $request->id_user, 
                                'periode' => $request->periode,
                                'semester' => $request->semester
                            ]);

            if ($save) {
              session()->flash('message', 'Data Berhasil diubah');
              return redirect('/pengujian');
            }else{
              session()->flash('error', 'Terjadi Kesalahan');
              return redirect('/pengujian');
            }
        }else{
            session()->flash('error', 'Jenis Bimbingan, Periode dan Semester Sudah pernah dibuat');
            return redirect('/pengujian');
        }

    }

    public function drop(request $request) {

        $success = DB::table('penguji_ujian_akhir')->where('id_penguji_ujian_akhir', '=', $request->id_penguji_ujian_akhir)->delete();

    }


    public function detail($id_penguji_ujian_akhir) {
        // return $id;
        $data['title'] = 'Detail Penguji Ujian Akhir';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $result = DB::table('penguji_ujian_akhir')
        ->where('id_penguji_ujian_akhir', '=', $id_penguji_ujian_akhir)
        ->join('periode', 'periode.id_periode', '=', 'penguji_ujian_akhir.periode')
        ->get();

        $mahasiswa = DB::table('mahasiswa_ujian_akhir')
        ->where('id_penguji_ujian_akhir', '=', $id_penguji_ujian_akhir)
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
        $data['id'] = $id_penguji_ujian_akhir;

        // return $data;

        // session()->flash('message', 'Data Berhasil dibuat');
        // return redirect('/bimbingan/laporanAkhir');

        return view('pengujian.detail', $data);
   }


    public function addMahasiswa($id_penguji_ujian_akhir) {

        $data['title'] = 'Tambah Mahasiswa Penguji Ujian Akhir';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        $periode = DB::table('periode')
        ->get();
        
        $data['periode'] = $periode;

        $result = DB::table('mahasiswa_ujian_akhir')
        ->where('id_penguji_ujian_akhir', '=', $id_penguji_ujian_akhir)
        ->count();

        if ($result < 8) {
            $data['id'] = $id_penguji_ujian_akhir;
            return view('pengujian.addMahasiswa', $data);
        }else{
            session()->flash('warning', 'Mahasiswa Bimbingan tidak bisa lebih dari 8');
            return redirect('/pengujian/detail/'.$id_penguji_ujian_akhir.'');
        }

    }

    public function CreateMahasiswa(request $request) {

        $fileName = time().'.'.$request->file->getClientOriginalExtension();
        $request['bukti_fisik']    = $fileName;

        $save = DB::table('mahasiswa_ujian_akhir')->insert(
                    [
                        'id_penguji_ujian_akhir' => $request->id_penguji_ujian_akhir, 
                        'nim_mahasiswa' => $request->nim_mahasiswa,
                        'nama_mahasiswa' => $request->nama_mahasiswa,
                        'bukti_fisik_desc' => $request->bukti_fisik_desc,
                        'bukti_fisik' => $request->bukti_fisik
                    ]
                );
        if ($save) {
            if ($request->file) {
                $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
            }
            session()->flash('message', 'Data Berhasil dibuat');
            return redirect('/pengujian/detail/'.$request->id_penguji_ujian_akhir.'');
        }else{
            session()->flash('error', 'Terjadi Kesalahan');
            return redirect('/pengujian/detail/'.$request->id_penguji_ujian_akhir.'');
        }

    }

    public function editMahasiswa($id_mahasiswa_ujian_akhir) {

        $data['title'] = 'Edit Mahasiswa Bimbingan Laporan Akhir';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('mahasiswa_ujian_akhir')
        ->where('id_mahasiswa_ujian_akhir', '=', $id_mahasiswa_ujian_akhir)
        ->get();

        $periode = DB::table('periode')
        ->get();
        
        $data['periode'] = $periode;

        $data['result'] = $result[0];

        return view('pengujian.editMahasiswa', $data);
    }

    public function saveMahasiswa(request $request) {

        if ($request->file) {
            $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;

            $save = DB::table('mahasiswa_ujian_akhir')
                            ->where('id_mahasiswa_ujian_akhir', $request->id_mahasiswa_ujian_akhir)
                            ->update([
                                'nim_mahasiswa' => $request->nim_mahasiswa,
                                'nama_mahasiswa' => $request->nama_mahasiswa,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc,
                                'bukti_fisik' => $request->bukti_fisik

                            ]);

        }else{
            $save = DB::table('mahasiswa_ujian_akhir')
                            ->where('id_mahasiswa_ujian_akhir', $request->id_mahasiswa_ujian_akhir)
                            ->update([
                                'nim_mahasiswa' => $request->nim_mahasiswa,
                                'nama_mahasiswa' => $request->nama_mahasiswa,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc

                            ]);
        }
        
        if ($save) {
            session()->flash('message', 'Data Berhasil diubah');
            return redirect('/pengujian/detail/'.$request->id_penguji_ujian_akhir.'');
        }else{
            session()->flash('error', 'Terjadi Kesalahan');
            return redirect('/pengujian/detail/'.$request->id_penguji_ujian_akhir.'');
        }

    }

    public function dropMahasiswa(request $request) {

        $success = DB::table('mahasiswa_ujian_akhir')
            ->where('id_mahasiswa_ujian_akhir', '=', $request->id_mahasiswa_ujian_akhir)->delete();

    }
}
