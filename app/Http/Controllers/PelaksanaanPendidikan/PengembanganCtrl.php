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

class PengembanganCtrl extends Controller {
    
    public function index() {

        $data['title'] = 'Melakukan kegiatan pengembangan diri untuk meningkatkan kompetensi';
        $data['subtitle'] = 'Kegiatan Pengembangan';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        $result = DB::table('pengembangan_diri')
        ->where('id_user', '=', $id_user)
        ->get();

        $data['result'] = $result;

        // return $data;

        return view('PelaksanaanPendidikan.pengembangan.index', $data);

    }

    public function add() {
                
        $data['title'] = 'Melakukan kegiatan pengembangan diri untuk meningkatkan kompetensi';
        $data['subtitle'] = 'Jabatan Pimpinan';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        return view('PelaksanaanPendidikan.pengembangan.add', $data);

    }

    public function create(request $request) {

        // return $request->all();
        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;

            $angka_kredit = $request->jam / 30;

            // return floor($angka_kredit);

            $save = DB::table('pengembangan_diri')->insert(
                [
                    'id_user' => $request->id_user, 
                    'nama_kegiatan' => $request->nama_kegiatan,
                    'tahun' => $request->tahun,
                    'jam' => $request->jam,
                    'volume_kegiatan' => 1,
                    'angka_kredit' => $angka_kredit,
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

        return redirect('/pendidikan/pengembangan');
    }

    public function edit($id) {

        $data['title'] = 'Melakukan kegiatan pengembangan diri untuk meningkatkan kompetensi';
        $data['subtitle'] = 'Pengembangan Diri';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('pengembangan_diri')
        ->where('id_pengembangan_diri', '=', $id)
        ->get();

        $data['result'] = $result[0];
        $data['id_user'] = $id_user;

        // return $data;

        return view('PelaksanaanPendidikan.pengembangan.edit', $data);
    }

    public function save(request $request) {

        $angka_kredit = $request->jam / 30;

        // return floor($angka_kredit);

        if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;

                $save = DB::table('pengembangan_diri')
                            ->where('id_pengembangan_diri', $request->id_pengembangan_diri)
                            ->update([
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tahun' => $request->tahun,
                                'jam' => $request->jam,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => floor($angka_kredit),
                                'bukti_fisik_desc' => $request->bukti_fisik_desc,
                                'bukti_fisik' => $request->bukti_fisik
                            ]);

                if ($save) {
                    if ($request->file) {
                        $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                    }
                }
            }else{

                $save = DB::table('pengembangan_diri')
                            ->where('id_pengembangan_diri', $request->id_pengembangan_diri)
                            ->update([
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tahun' => $request->tahun,
                                'jam' => $request->jam,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => floor($angka_kredit),
                                'bukti_fisik_desc' => $request->bukti_fisik_desc
                        ]);
            }

        return redirect('/pendidikan/pengembangan');

    }

    public function drop(request $request) {
        $success = DB::table('pengembangan_diri')->where('id_pengembangan_diri', '=', $request->id_pengembangan_diri)->delete();
    }

}
