<?php

namespace App\Http\Controllers\Penelitian;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class PenelitianECtrl extends Controller {
    

    public function index() {

        $data['title'] = 'E. Membuat rancangan dan karya teknologi, rancangan dan karya seni monumental / seni pertunjukan / karya sastra';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $result = DB::table('rancangan_karya_seni')
        ->where('id_user', '=', Auth::user()->id_user)
        ->get();

        $data['result'] = $result;

        return view('penelitian.rancangan_karya_seni.index', $data);

    }

    public function add() {

        $data['title'] = 'Tambah Membuat rancangan dan karya teknologi, rancangan dan karya seni monumental / seni pertunjukan / karya sastra';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;
        
        $data['id_user'] = Auth::user()->id_user;

        return view('penelitian.rancangan_karya_seni.add', $data);
    }

    public function create(request $request) {

        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;

            $save = DB::table('rancangan_karya_seni')->insert(
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
                return redirect('/penelitian/e/index');
            }else{
                session()->flash('error', 'Terjadi Kesalahan');
                return redirect('/penelitian/e/index');
            }
        }

        return redirect('/penelitian/e/index');

    }

    public function edit($id) {

        $data['title'] = 'Edit Membuat rancangan dan karya teknologi, rancangan dan karya seni monumental / seni pertunjukan / karya sastra';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('rancangan_karya_seni')
        ->where('id_rancangan_karya_seni', '=', $id)
        ->get();

        $data['result'] = $result[0];

        // return $data;

        return view('penelitian.rancangan_karya_seni.edit', $data);
    }

    public function save(request $request) {

            if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;

                $save = DB::table('rancangan_karya_seni')
                            ->where('id_rancangan_karya_seni', $request->id_rancangan_karya_seni)
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

                $save = DB::table('rancangan_karya_seni')
                            ->where('id_rancangan_karya_seni', $request->id_rancangan_karya_seni)
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
                return redirect('/penelitian/e/index');
            }else{
                session()->flash('error', 'Terjadi Kesalahan');
                return redirect('/penelitian/e/index');
            }

        return redirect('/penelitian/e/index');

    }

    public function drop(request $request) {

        $success = DB::table('rancangan_karya_seni')->where('id_rancangan_karya_seni', '=', $request->id_rancangan_karya_seni)->delete();

    }
}
