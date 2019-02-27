<?php

namespace App\Http\Controllers\Penelitian;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class PenelitianBCtrl extends Controller {
    

    public function index() {

        $data['title'] = 'B. Menyadur Buku Ilmiah';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $result = DB::table('menyadur_buku_ilmiah')
        ->where('id_user', '=', Auth::user()->id_user)
        ->get();

        $data['result'] = $result;

        return view('penelitian.menyadur_buku_ilmiah.index', $data);

    }

    public function add() {

        $data['title'] = 'Tambah Menyadur Buku Ilmiah';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;
        
        $data['id_user'] = Auth::user()->id_user;

        return view('penelitian.menyadur_buku_ilmiah.add', $data);
    }

    public function create(request $request) {

        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;

            $save = DB::table('menyadur_buku_ilmiah')->insert(
                [
                    'id_user' => $request->id_user, 
                    'nama_kegiatan' => $request->nama_kegiatan,
                    'tanggal' => $request->tanggal_kegiatan,
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
                return redirect('/penelitian/b/index');
            }else{
                session()->flash('error', 'Terjadi Kesalahan');
                return redirect('/penelitian/b/index');
            }
        }

        return redirect('/penelitian/b/index');

    }

    public function edit($id) {

        $data['title'] = 'Edit Menyadur Buku Ilmiah';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('menyadur_buku_ilmiah')
        ->where('id_menyadur_buku_ilmiah', '=', $id)
        ->get();

        $data['result'] = $result[0];

        // return $data;

        return view('penelitian.menyadur_buku_ilmiah.edit', $data);
    }

    public function save(request $request) {

            if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;

                $save = DB::table('menyadur_buku_ilmiah')
                            ->where('id_menyadur_buku_ilmiah', $request->id_karya_ilmiah)
                            ->update([
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tanggal' => $request->tanggal_kegiatan,
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

                $save = DB::table('menyadur_buku_ilmiah')
                            ->where('id_menyadur_buku_ilmiah', $request->id_karya_ilmiah)
                            ->update([
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tanggal' => $request->tanggal_kegiatan,
                                'satuan_hasil' => $request->satuan_hasil,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => $request->angka_kredit,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc
                        ]);
            }

            if ($save) {
                session()->flash('message', 'Data Berhasil diubah');
                return redirect('/penelitian/b/index');
            }else{
                session()->flash('error', 'Terjadi Kesalahan');
                return redirect('/penelitian/b/index');
            }

        return redirect('/penelitian/b/index');

    }

    public function drop(request $request) {

        $success = DB::table('menyadur_buku_ilmiah')->where('id_menyadur_buku_ilmiah', '=', $request->id_menyadur_buku_ilmiah)->delete();

    }
}
