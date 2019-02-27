<?php

namespace App\Http\Controllers\PelaksanaanPendidikan;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\MPelaksanaanPendidikan;
use App\User;
use DB;

class JabatanPimpinanCtrl extends Controller {
    

    public function index() {

        $data['title'] = 'Menduduki jabatan pimpinan perguruan tinggi';
        $data['subtitle'] = 'Jabatan Pimpinan';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        $result = DB::table('jabatan_pimpinan')
        ->where('id_user', '=', $id_user)
        ->get();

        $data['result'] = $result;

        // return $data;

        return view('PelaksanaanPendidikan.jabatan_pimpinan.index', $data);

    }

    public function add() {
                
        $data['title'] = 'Menduduki jabatan pimpinan perguruan tinggi';
        $data['subtitle'] = 'Jabatan Pimpinan';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        return view('PelaksanaanPendidikan.jabatan_pimpinan.add', $data);

    }

    public function create(request $request) {

        // return $request->all();
        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;

            $save = DB::table('jabatan_pimpinan')->insert(
                [
                    'id_user' => $request->id_user, 
                    'nama_kegiatan' => $request->nama_kegiatan,
                    'tahun' => $request->tahun,
                    'status' => $request->status,
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
            }
        }

        return redirect('/pendidikan/jabatan');
    }

    public function edit($id) {

        $data['title'] = 'Menduduki jabatan pimpinan perguruan tinggi';
        $data['subtitle'] = 'Jabatan Pimpinan';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('jabatan_pimpinan')
        ->where('id_jabatan_pimpinan', '=', $id)
        ->get();

        $data['result'] = $result[0];
        $data['id_user'] = $id_user;

        // return $data;

        return view('PelaksanaanPendidikan.jabatan_pimpinan.edit', $data);
    }

    public function save(request $request) {

        if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;

                $save = DB::table('jabatan_pimpinan')
                            ->where('id_jabatan_pimpinan', $request->id_jabatan_pimpinan)
                            ->update([
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tahun' => $request->tahun,
                                'status' => $request->status,
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

                $save = DB::table('jabatan_pimpinan')
                            ->where('id_jabatan_pimpinan', $request->id_jabatan_pimpinan)
                            ->update([
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tahun' => $request->tahun,
                                'status' => $request->status,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => $request->angka_kredit,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc
                        ]);
            }

        return redirect('/pendidikan/jabatan');

    }

    public function drop(request $request) {
        $success = DB::table('jabatan_pimpinan')->where('id_jabatan_pimpinan', '=', $request->id_jabatan_pimpinan)->delete();
    }
}
