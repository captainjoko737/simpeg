<?php

namespace App\Http\Controllers\Dosen;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class DosenCtrl extends Controller {

    public function index() {

        $data['title'] = 'Daftar Dosen';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_prodi = Auth::user()->id_prodi;
        
        $result = DB::table('users')
        ->where('id_prodi', '=', $id_prodi)
        ->where('is_admin', '=', 0)
        ->get();

        foreach ($result as $key => $value) {
            $pendidikan = DB::table('pendidikan_formal')
            ->where('id_user', '=', $value->id_user)
            ->orderBy('id_pendidikan_formal', 'DESC')
            ->first();

            $result[$key]->pendidikan = $pendidikan;
        }

        $data['result'] = $result;

        return view('dosen.index', $data);
    }

    public function add() {

        $data['title'] = 'Tambah Dosen Baru';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_prodi = Auth::user()->id_prodi;
        
        $data['id_prodi'] = $id_prodi;

        return view('dosen.add', $data);
    }

    public function Create(request $request) {

        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;

            $save = DB::table('bahan_pengajaran')->insert(
                [
                    'id_user' => $request->id_user, 
                    'tahun' => $request->tahun,
                    'volume_kegiatan' => $request->volume_kegiatan,
                    'nama' => $request->nama,
                    'bukti_fisik_desc' => $request->bukti_fisik_desc,
                    'bukti_fisik' => $request->bukti_fisik
                ]
            );

            if ($save) {
                if ($request->file) {
                    $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                }
                session()->flash('message', 'Data Berhasil dibuat');
                return redirect('/bahan/pengajaran');
            }else{
                session()->flash('error', 'Terjadi Kesalahan');
                return redirect('/bahan/pengajaran');
            }
        }

        return redirect('/bahan/pengajaran');

    }

    public function edit($id) {

        $data['title'] = 'Edit Bahan Pengajaran';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('bahan_pengajaran')
        ->where('bahan_pengajaran.id_bahan_pengajaran', '=', $id)
        ->get();

        $data['result'] = $result[0];
        $data['id_user'] = $id_user;

        return view('bahanPengajaran.edit', $data);
    }

    public function save(request $request) {

            if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;

                $save = DB::table('bahan_pengajaran')
                            ->where('id_bahan_pengajaran', $request->id_bahan_pengajaran)
                            ->update([
                                'tahun' => $request->tahun,
                                'nama' => $request->nama,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc,
                                'bukti_fisik' => $request->bukti_fisik
                            ]);

                if ($save) {
                    if ($request->file) {
                        $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                    }
                }
            }else{

                $save = DB::table('bahan_pengajaran')
                            ->where('id_bahan_pengajaran', $request->id_bahan_pengajaran)
                            ->update([
                                'tahun' => $request->tahun,
                                'nama' => $request->nama,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc
                        ]);
            }

            if ($save) {
                session()->flash('message', 'Data Berhasil diubah');
                return redirect('/bahan/pengajaran');
            }else{
                session()->flash('error', 'Terjadi Kesalahan');
                return redirect('/bahan/pengajaran');
            }

        return redirect('/bahan/pengajaran');

    }

    public function drop(request $request) {

        $success = DB::table('bahan_pengajaran')->where('id_bahan_pengajaran', '=', $request->id_bahan_pengajaran)->delete();

    }
}
