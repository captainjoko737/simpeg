<?php

namespace App\Http\Controllers\Kegiatan;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\MBimbingan;
use DB;


class KegiatanCtrl extends Controller {
   

   public function index() {

        $data['title'] = 'Membina Kegiatan Mahasiswa';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('kegiatan_mahasiswa')
        ->where('id_user', '=', $id_user)
        ->join('periode', 'periode.id_periode', '=', 'kegiatan_mahasiswa.periode')
        ->orderBy('kegiatan_mahasiswa.id_kegiatan_mahasiswa', 'DESC')
        ->get();

        foreach ($result as $key => $value) {
            if ($value->semester == 1) {
                $result[$key]->semester = 'Ganjil';
            }else{
                $result[$key]->semester = 'Genap';
            }
        }

        $data['result'] = $result;
        // session()->flash('message', 'Laporan anda telah berhasil di tambahkan');

        return view('kegiatanMahasiswa.index', $data);
   }

   public function add() {

        $data['title'] = 'Tambah Kegiatan Mahasiswa';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        $periode = DB::table('periode')
        ->get();
        
        $data['periode'] = $periode;

        return view('kegiatanMahasiswa.add', $data);
    }

    public function Create(request $request) {

        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;

            $save = DB::table('kegiatan_mahasiswa')->insert(
                [
                    'id_user' => $request->id_user, 
                    'periode' => $request->periode,
                    'nama' => $request->nama,
                    'semester' => $request->semester,
                    'bukti_fisik_desc' => $request->bukti_fisik_desc,
                    'bukti_fisik' => $request->bukti_fisik
                ]
            );

            if ($save) {
                if ($request->file) {
                    $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                }
                session()->flash('message', 'Data Berhasil dibuat');
                return redirect('/kegiatan/mahasiswa');
            }else{
                session()->flash('error', 'Terjadi Kesalahan');
                return redirect('/kegiatan/mahasiswa');
            }
        }

        return redirect('/kegiatan/mahasiswa');

    }

    public function edit($id) {

        $data['title'] = 'Edit Kegiatan Mahasiswa';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('kegiatan_mahasiswa')
        ->join('periode', 'periode.id_periode', '=', 'kegiatan_mahasiswa.periode')
        ->where('kegiatan_mahasiswa.id_kegiatan_mahasiswa', '=', $id)
        ->get();

        $periode = DB::table('periode')
        ->get();
        
        $data['periode'] = $periode;

        $data['result'] = $result[0];
        $data['id_user'] = $id_user;

        return view('kegiatanMahasiswa.edit', $data);
    }

    public function save(request $request) {

            if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;

                $save = DB::table('kegiatan_mahasiswa')
                            ->where('id_kegiatan_mahasiswa', $request->id_kegiatan_mahasiswa)
                            ->update([
                                'periode' => $request->periode,
                                'nama' => $request->nama,
                                'semester' => $request->semester,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc,
                                'bukti_fisik' => $request->bukti_fisik
                            ]);

                if ($save) {
                    if ($request->file) {
                        $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                    }
                }
            }else{

                $save = DB::table('kegiatan_mahasiswa')
                            ->where('id_kegiatan_mahasiswa', $request->id_kegiatan_mahasiswa)
                            ->update([
                                'periode' => $request->periode,
                                'nama' => $request->nama,
                                'semester' => $request->semester
                        ]);
            }

            if ($save) {
                session()->flash('message', 'Data Berhasil diubah');
                return redirect('/kegiatan/mahasiswa');
            }else{
                session()->flash('error', 'Terjadi Kesalahan');
                return redirect('/kegiatan/mahasiswa');
            }

        return redirect('/kegiatan/mahasiswa');

    }

    public function drop(request $request) {

        $success = DB::table('kegiatan_mahasiswa')->where('id_kegiatan_mahasiswa', '=', $request->id_kegiatan_mahasiswa)->delete();

    }

}
