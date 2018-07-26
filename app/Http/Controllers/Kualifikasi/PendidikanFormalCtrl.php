<?php

namespace App\Http\Controllers\Kualifikasi;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\MPendidikanFormal;
use DB;

class PendidikanFormalCtrl extends Controller {
    
    public function index() {

        $data['title'] = 'Pendidikan Formal';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;

        $queryPendidikanFormal  = MPendidikanFormal::query();
        $queryPendidikanFormal  = $queryPendidikanFormal->where('id_user', '=', $id_user);
        $queryPendidikanFormal  = $queryPendidikanFormal->orderBy('id_pendidikan_formal', 'DESC');
        $resultPendidikanFormal = $queryPendidikanFormal->get();

        $data['pendidikan_formal'] = $resultPendidikanFormal;
        // return $resultPendidikanFormal;

        return view('kualifikasi.index', $data);

    }

    public function add() {
                
        $data['title'] = 'Tambah Pendidikan Formal';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        return view('kualifikasi.add', $data);

    }

    public function create(request $request) {

        // return $request->all();

        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;

            $save = DB::table('pendidikan_formal')->insert(
                [
                    'id_user' => $request->id_user, 
                    'jenjang_studi' => $request->jenjang_studi,
                    'gelar_akademik' => $request->gelar_akademik, 
                    'bidang_studi' => $request->bidang_studi,
                    'perguruan_tinggi' => $request->perguruan_tinggi,
                    'fakultas' => $request->fakultas,
                    'program_studi' => $request->program_studi,
                    'tahun_masuk' => $request->tahun_masuk,
                    'tahun_lulus' => $request->tahun_lulus,
                    'tanggal_kelulusan' => $request->tanggal_kelulusan,
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

        return redirect('/kualifikasi/pendidikanFormal');

    }

    public function edit($id_pendidikan_formal) {
                
        $data['title'] = 'Edit Pendidikan Formal';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $pendidikanFormal = MPendidikanFormal::find($id_pendidikan_formal);

        $data['pendidikanFormal'] = $pendidikanFormal;
        $data['id_user'] = $id_user;

        return view('kualifikasi.edit', $data);

    }

    public function save(request $request) {

        if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;

                $save = DB::table('pendidikan_formal')
                            ->where('id_pendidikan_formal', $request->id_pendidikan_formal)
                            ->update([
                                'jenjang_studi' => $request->jenjang_studi,
                                'gelar_akademik' => $request->gelar_akademik,
                                'bidang_studi' => $request->bidang_studi,
                                'perguruan_tinggi' => $request->perguruan_tinggi,
                                'fakultas' => $request->fakultas,
                                'program_studi' => $request->program_studi,
                                'tahun_masuk' => $request->tahun_masuk,
                                'tahun_lulus' => $request->tahun_lulus,
                                'tanggal_kelulusan' => $request->tanggal_kelulusan,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc,
                                'bukti_fisik' => $request->bukti_fisik
                            ]);

                if ($save) {
                    if ($request->file) {
                        $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                    }
                }
            }else{

                $save = DB::table('pendidikan_formal')
                            ->where('id_pendidikan_formal', $request->id_pendidikan_formal)
                            ->update([
                                'jenjang_studi' => $request->jenjang_studi,
                                'gelar_akademik' => $request->gelar_akademik,
                                'bidang_studi' => $request->bidang_studi,
                                'perguruan_tinggi' => $request->perguruan_tinggi,
                                'fakultas' => $request->fakultas,
                                'program_studi' => $request->program_studi,
                                'tahun_masuk' => $request->tahun_masuk,
                                'tahun_lulus' => $request->tahun_lulus,
                                'tanggal_kelulusan' => $request->tanggal_kelulusan,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc
                        ]);
            }

        return redirect('/kualifikasi/pendidikanFormal');

    }

    public function drop(request $request) {

        $pendidikanFormal = MPendidikanFormal::find($request->id_pendidikan_formal);

        $success = $pendidikanFormal->delete();

    }










}
