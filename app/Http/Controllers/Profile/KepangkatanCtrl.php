<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\MKepangkatan;

class KepangkatanCtrl extends Controller {
    
    public function index() {
                
        $data['title'] = 'Kepangkatan';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;

        $queryKepangkatan  = MKepangkatan::query();
        $queryKepangkatan  = $queryKepangkatan->where('id_user', '=', $id_user);
        $queryKepangkatan  = $queryKepangkatan->orderBy('id_kepangkatan', 'DESC');
        $resultKepangkatan = $queryKepangkatan->get();

        $data['kepangkatan'] = $resultKepangkatan;

        return view('profile.kepangkatan', $data);

    }

    public function tambahKepangkatan() {
                
        $data['title'] = 'Tambah Kepangkatan';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        return view('profile.tambahKepangkatan', $data);

    }

    public function AddKepangkatan(request $request) {

        $kepangkatan = MKepangkatan::create($request->all());

        if ($kepangkatan) {
            return redirect('/profile/kepangkatan');
        }else{
            return redirect('/profile/kepangkatan/add');
        }
    }

    public function EditKepangkatan($id_kepangkatan) {
                
        $data['title'] = 'Edit Kepangkatan';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $kepangkatan = MKepangkatan::find($id_kepangkatan);

        $data['kepangkatan'] = $kepangkatan;
        $data['id_user'] = $id_user;

        return view('profile.editKepangkatan', $data);

    }

    public function SaveKepangkatan(request $request) {

        $update = MKepangkatan::where('id_kepangkatan', '=', $request->id_kepangkatan)
                        ->update([
                            'golongan_pangkat' => $request->golongan_pangkat,
                            'nomor_sk_kepangkatan' => $request->nomor_sk_kepangkatan,
                            'tanggal_sk' => $request->tanggal_sk,
                            'terhitung_mulai_tanggal' => $request->terhitung_mulai_tanggal,
                            'angka_kredit' => $request->angka_kredit,
                            'masa_kerja_tahun' => $request->masa_kerja_tahun,
                            'masa_kerja_bulan' => $request->masa_kerja_bulan,
                            ]);

        return redirect('/profile/kepangkatan');

    }

    public function deleteKepangkatan(request $request) {

        $kepangkatan = MKepangkatan::find($request->id_kepangkatan);

        $success = $kepangkatan->delete();

    }

}
