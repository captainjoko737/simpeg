<?php

namespace App\Http\Controllers\Pengabdian;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\MJabatanStruktural;
use DB;

class JabatanStrukturalCtrl extends Controller {
    
    public function index() {

        $data['title'] = 'Jabatan Struktural';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        $queryJabatanStruktural  = MJabatanStruktural::query();
        $queryJabatanStruktural  = $queryJabatanStruktural->where('id_user', '=', $id_user);
        $queryJabatanStruktural  = $queryJabatanStruktural->orderBy('id_jabatan_struktural', 'DESC');
        $resultJabatanStruktural = $queryJabatanStruktural->get();

        $data['jabatan_struktural'] = $resultJabatanStruktural;

        return view('pengabdian.index', $data);

    }

    public function add() {
                
        $data['title'] = 'Tambah Jabatan Struktural';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        return view('pengabdian.add', $data);

    }

    public function create(request $request) {

        // $jabatanStruktural = MJabatanStruktural::create($request->all());

        // if ($jabatanStruktural) {
        //     return redirect('/pengabdian/jabatanStruktural');
        // }else{
        //     return redirect('/pengabdian/jabatanStruktural/add');
        // }

        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;

            $save = DB::table('jabatan_struktural')->insert(
                [
                    'id_user' => $request->id_user, 
                    'jabatan_tugas' => $request->jabatan_tugas,
                    'kategori_kegiatan' => $request->kategori_kegiatan,
                    'nomor_sk_jabatan_struktural' => $request->nomor_sk_jabatan_struktural,
                    'terhitung_mulai_tanggal' => $request->terhitung_mulai_tanggal,
                    'lokasi_penugasan' => $request->lokasi_penugasan,
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

        return redirect('/pengabdian/jabatanStruktural');
    }

    public function edit($id_jabatan_struktural) {
                
        $data['title'] = 'Edit Jabatan Struktural';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $jabatanStruktural = MJabatanStruktural::find($id_jabatan_struktural);

        $data['jabatanStruktural'] = $jabatanStruktural;
        $data['id_user'] = $id_user;

        return view('pengabdian.edit', $data);

    }

    public function save(request $request) {

        // $update = MJabatanStruktural::where('id_jabatan_struktural', '=', $request->id_jabatan_struktural)
        //                 ->update([
                            // 'jabatan_tugas' => $request->jabatan_tugas,
                            // 'kategori_kegiatan' => $request->kategori_kegiatan,
                            // 'nomor_sk_jabatan_struktural' => $request->nomor_sk_jabatan_struktural,
                            // 'terhitung_mulai_tanggal' => $request->terhitung_mulai_tanggal,
                            // 'lokasi_penugasan' => $request->lokasi_penugasan,
        //                     ]);

        // return redirect('/pengabdian/jabatanStruktural');
        if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;

                $save = DB::table('jabatan_struktural')
                            ->where('id_jabatan_struktural', $request->id_jabatan_struktural)
                            ->update([
                                'jabatan_tugas' => $request->jabatan_tugas,
                                'kategori_kegiatan' => $request->kategori_kegiatan,
                                'nomor_sk_jabatan_struktural' => $request->nomor_sk_jabatan_struktural,
                                'terhitung_mulai_tanggal' => $request->terhitung_mulai_tanggal,
                                'lokasi_penugasan' => $request->lokasi_penugasan,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc,
                                'bukti_fisik' => $request->bukti_fisik
                            ]);

                if ($save) {
                    if ($request->file) {
                        $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                    }
                }
            }else{

                $save = DB::table('jabatan_struktural')
                            ->where('id_jabatan_struktural', $request->id_jabatan_struktural)
                            ->update([
                                'jabatan_tugas' => $request->jabatan_tugas,
                                'kategori_kegiatan' => $request->kategori_kegiatan,
                                'nomor_sk_jabatan_struktural' => $request->nomor_sk_jabatan_struktural,
                                'terhitung_mulai_tanggal' => $request->terhitung_mulai_tanggal,
                                'lokasi_penugasan' => $request->lokasi_penugasan,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc
                        ]);
            }

        return redirect('/pengabdian/jabatanStruktural');

    }

    public function drop(request $request) {

        $jabatanStruktural = MJabatanStruktural::find($request->id_jabatan_struktural);

        $success = $jabatanStruktural->delete();

    }




}






























