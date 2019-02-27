<?php

namespace App\Http\Controllers\Penelitian;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class PublikasiKaryaCtrl extends Controller {
    
    public function index() {

        $data['title'] = 'Publikasi Karya';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $resultIsPublikasi = DB::table('karya_ilmiah')
        ->where('id_user', '=', Auth::user()->id_user)
        ->where('is_publikasi', '=', 1)
        ->get();

        $resultIsNotPublikasi = DB::table('karya_ilmiah')
        ->where('id_user', '=', Auth::user()->id_user)
        ->where('is_publikasi', '=', 0)
        ->get();

        $data['is_publikasi'] = $resultIsPublikasi;
        $data['is_not_publikasi'] = $resultIsNotPublikasi;

        // return $data;

        return view('penelitian.menghasilkan_karya_ilmiah.index', $data);

    }

    public function add() {

        $data['title'] = 'Tambah Karya Ilmiah';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;
        
        $data['id_user'] = Auth::user()->id_user;

        return view('penelitian.menghasilkan_karya_ilmiah.add', $data);
    }

    public function create(request $request) {

        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;

            // return $request->all();

            $save = DB::table('karya_ilmiah')->insert(
                [
                    'id_user' => $request->id_user, 
                    'is_publikasi' => $request->is_publikasi,
                    'kategori' => $request->kategori,
                    'nama_kegiatan' => $request->nama_kegiatan,
                    'tanggal' => $request->tanggal,
                    'satuan_hasil' => $request->satuan_hasil,
                    'volume_kegiatan' => $request->volume_kegiatan,
                    'angka_kredit' => $request->angka_kredit,
                    'bukti_fisik_desc' => $request->bukti_fisik_desc,
                    'bukti_fisik' => $request->bukti_fisik
                ]
            );

            if ($save) {
                if ($request->file) {
                    $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                }
                session()->flash('message', 'Data Berhasil dibuat');
                return redirect('/penelitian/publikasiKarya');
            }else{
                session()->flash('error', 'Terjadi Kesalahan');
                return redirect('/penelitian/publikasiKarya');
            }
        }

        return redirect('/penelitian/publikasiKarya');

    }

    public function edit($id) {

        $data['title'] = 'Edit Karya Ilmiah';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('karya_ilmiah')
        ->where('id_karya_ilmiah', '=', $id)
        ->get();

        $data['result'] = $result[0];

        return view('penelitian.menghasilkan_karya_ilmiah.edit', $data);
    }

    public function save(request $request) {

            if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;

                $save = DB::table('karya_ilmiah')
                            ->where('id_karya_ilmiah', $request->id_karya_ilmiah)
                            ->update([
                                'is_publikasi' => $request->is_publikasi,
			                    'kategori' => $request->kategori,
			                    'nama_kegiatan' => $request->nama_kegiatan,
			                    'tanggal' => $request->tanggal,
			                    'satuan_hasil' => $request->satuan_hasil,
			                    'volume_kegiatan' => $request->volume_kegiatan,
			                    'angka_kredit' => $request->angka_kredit,
			                    'bukti_fisik_desc' => $request->bukti_fisik_desc,
			                    'bukti_fisik' => $request->bukti_fisik
                            ]);

                if ($save) {
                    if ($request->file) {
                        $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                    }
                }
            }else{

                $save = DB::table('karya_ilmiah')
                            ->where('id_karya_ilmiah', $request->id_karya_ilmiah)
                            ->update([
                                 'is_publikasi' => $request->is_publikasi,
			                    'kategori' => $request->kategori,
			                    'nama_kegiatan' => $request->nama_kegiatan,
			                    'tanggal' => $request->tanggal,
			                    'satuan_hasil' => $request->satuan_hasil,
			                    'volume_kegiatan' => $request->volume_kegiatan,
			                    'angka_kredit' => $request->angka_kredit,
			                    'bukti_fisik_desc' => $request->bukti_fisik_desc
                        ]);
            }

            if ($save) {
                session()->flash('message', 'Data Berhasil diubah');
                return redirect('/penelitian/publikasiKarya');
            }else{
                session()->flash('error', 'Terjadi Kesalahan');
                return redirect('/penelitian/publikasiKarya');
            }

        return redirect('/penelitian/publikasiKarya');

    }

    public function drop(request $request) {

        $success = DB::table('karya_ilmiah')->where('id_karya_ilmiah', '=', $request->id_karya_ilmiah)->delete();

    }

}
