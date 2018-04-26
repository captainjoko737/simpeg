<?php

namespace App\Http\Controllers\Kualifikasi;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\MPendidikanFormal;

class PendidikanFormalCtrl extends Controller {
    
    public function index() {

        $data['title'] = 'Pendidikan Formal';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        $queryPendidikanFormal  = MPendidikanFormal::query();
        $queryPendidikanFormal  = $queryPendidikanFormal->where('id_user', '=', $id_user);
        $resultPendidikanFormal = $queryPendidikanFormal->get();

        $data['pendidikan_formal'] = $resultPendidikanFormal;
        // return $resultPendidikanFormal;

        return view('kualifikasi.pendidikan_formal', $data);

    }

    public function tambahPendidikanFormal() {
                
        $data['title'] = 'Tambah Pendidikan Formal';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        return view('kualifikasi.tambahPendidikanFormal', $data);

    }

    public function AddPendidikanFormal(request $request) {

        $pendidikanFormal = MPendidikanFormal::create($request->all());

        if ($pendidikanFormal) {
            return redirect('/kualifikasi/pendidikanFormal');
        }else{
            return redirect('/kualifikasi/pendidikanFormal/add');
        }
    }

    public function EditPendidikanFormal($id_pendidikan_formal) {
                
        $data['title'] = 'Edit Pendidikan Formal';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $pendidikanFormal = MPendidikanFormal::find($id_pendidikan_formal);

        $data['pendidikanFormal'] = $pendidikanFormal;
        $data['id_user'] = $id_user;

        return view('kualifikasi.editPendidikanFormal', $data);

    }

    public function SavePendidikanFormal(request $request) {

        $update = MPendidikanFormal::where('id_pendidikan_formal', '=', $request->id_pendidikan_formal)
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
                            ]);

        return redirect('/kualifikasi/pendidikanFormal');

    }

    public function deletePendidikanFormal(request $request) {

        $pendidikanFormal = MPendidikanFormal::find($request->id_pendidikan_formal);

        $success = $pendidikanFormal->delete();

    }










}
