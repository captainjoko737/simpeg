<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\MKepangkatan;
use DB;

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

        return view('profile.kepangkatan.index', $data);

    }

    public function add() {
                
        $data['title'] = 'Tambah Kepangkatan';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        return view('profile.kepangkatan.add', $data);

    }

    public function create(request $request) {

        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;

            $save = DB::table('kepangkatan')->insert(
                [
                    'id_user' => $request->id_user, 
                    'golongan_pangkat' => $request->golongan_pangkat,
                    'nomor_sk_kepangkatan' => $request->nomor_sk_kepangkatan, 
                    'tanggal_sk' => $request->tanggal_sk,
                    'terhitung_mulai_tanggal' => $request->terhitung_mulai_tanggal,
                    'angka_kredit' => $request->angka_kredit,
                    'masa_kerja_tahun' => $request->masa_kerja_tahun,
                    'masa_kerja_bulan' => $request->masa_kerja_bulan,
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

        return redirect('/profile/kepangkatan');

    }

    public function edit($id_kepangkatan) {
                
        $data['title'] = 'Edit Kepangkatan';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $kepangkatan = MKepangkatan::find($id_kepangkatan);

        $data['kepangkatan'] = $kepangkatan;
        $data['id_user'] = $id_user;

        return view('profile.kepangkatan.edit', $data);

    }

    public function save(request $request) {

        if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;

                $save = DB::table('kepangkatan')
                            ->where('id_kepangkatan', $request->id_kepangkatan)
                            ->update([
                                'golongan_pangkat' => $request->golongan_pangkat,
                                'nomor_sk_kepangkatan' => $request->nomor_sk_kepangkatan,
                                'tanggal_sk' => $request->tanggal_sk,
                                'terhitung_mulai_tanggal' => $request->terhitung_mulai_tanggal,
                                'angka_kredit' => $request->angka_kredit,
                                'masa_kerja_tahun' => $request->masa_kerja_tahun,
                                'masa_kerja_bulan' => $request->masa_kerja_bulan,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc,
                                'bukti_fisik' => $request->bukti_fisik
                            ]);

                if ($save) {
                    if ($request->file) {
                        $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                    }
                }
            }else{

                $save = DB::table('kepangkatan')
                            ->where('id_kepangkatan', $request->id_kepangkatan)
                            ->update([
                                'golongan_pangkat' => $request->golongan_pangkat,
                                'nomor_sk_kepangkatan' => $request->nomor_sk_kepangkatan,
                                'tanggal_sk' => $request->tanggal_sk,
                                'terhitung_mulai_tanggal' => $request->terhitung_mulai_tanggal,
                                'angka_kredit' => $request->angka_kredit,
                                'masa_kerja_tahun' => $request->masa_kerja_tahun,
                                'masa_kerja_bulan' => $request->masa_kerja_bulan,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc
                        ]);
            }

        return redirect('/profile/kepangkatan');

    }

    public function drop(request $request) {

        $kepangkatan = MKepangkatan::find($request->id_kepangkatan);

        $success = $kepangkatan->delete();

    }

}
