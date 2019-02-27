<?php

namespace App\Http\Controllers\Penelitian;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class PenelitianDCtrl extends Controller {
    

    public function index() {

        $data['title'] = 'D. Membuat rencana dan karya teknologi yang dipatenkan';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $result = DB::table('karya_teknologi')
        ->where('id_user', '=', Auth::user()->id_user)
        ->get();

        $data['result'] = $result;

        return view('penelitian.karya_teknologi.index', $data);

    }

    public function add() {

        $data['title'] = 'Tambah Membuat rencana dan karya teknologi yang dipatenkan';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;
        
        $data['id_user'] = Auth::user()->id_user;

        return view('penelitian.karya_teknologi.add', $data);
    }

    public function create(request $request) {

        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;

            $save = DB::table('karya_teknologi')->insert(
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
                return redirect('/penelitian/d/index');
            }else{
                session()->flash('error', 'Terjadi Kesalahan');
                return redirect('/penelitian/d/index');
            }
        }

        return redirect('/penelitian/d/index');

    }

    public function edit($id) {

        $data['title'] = 'Edit Membuat rencana dan karya teknologi yang dipatenkan';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('karya_teknologi')
        ->where('id_karya_teknologi', '=', $id)
        ->get();

        $data['result'] = $result[0];

        // return $data;

        return view('penelitian.karya_teknologi.edit', $data);
    }

    public function save(request $request) {

            if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;

                $save = DB::table('karya_teknologi')
                            ->where('id_karya_teknologi', $request->id_karya_teknologi)
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

                $save = DB::table('karya_teknologi')
                            ->where('id_karya_teknologi', $request->id_karya_teknologi)
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
                return redirect('/penelitian/d/index');
            }else{
                session()->flash('error', 'Terjadi Kesalahan');
                return redirect('/penelitian/d/index');
            }

        return redirect('/penelitian/d/index');

    }

    public function drop(request $request) {

        $success = DB::table('karya_teknologi')->where('id_karya_teknologi', '=', $request->id_karya_teknologi)->delete();

    }
}
