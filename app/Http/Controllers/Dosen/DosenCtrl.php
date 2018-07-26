<?php

namespace App\Http\Controllers\Dosen;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class DosenCtrl extends Controller {

    public function index() {

        $data['title'] = 'Daftar Dosen';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_prodi = Auth::user()->id_prodi;
        
        $result = DB::table('users')
        ->where('id_prodi', '=', $id_prodi)
        ->where('is_admin', '=', 0)
        ->get();

        foreach ($result as $key => $value) {
            $pendidikan = DB::table('pendidikan_formal')
            ->where('id_user', '=', $value->id_user)
            ->orderBy('id_pendidikan_formal', 'DESC')
            ->first();

            $result[$key]->pendidikan = $pendidikan;
        }

        $data['result'] = $result;

        return view('dosen.index', $data);
    }

    public function add() {

        $data['title'] = 'Tambah Dosen Baru';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_prodi = Auth::user()->id_prodi;
        
        $data['id_prodi'] = $id_prodi;

        return view('dosen.add', $data);
    }

    public function Create(request $request) {

        // return $request->all();

        $fileName = time().'.'.$request->image_file->getClientOriginalExtension();
        $request['photo']    = $fileName;

        $password = bcrypt($request->password);
        $dataPribadi = [
                    'username' => $request->username, 
                    'password' => $password,
                    'password_readable' => $request->password, 
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'agama' => $request->agama,
                    'kewarganegaraan' => $request->kewarganegaraan,
                    'is_admin' => 0,
                    'status_edit' => 0,
                    'photo' => $request->photo
                ];

        $id_user = DB::table('users')->insertGetId($dataPribadi);

        $request->image_file->move(base_path().'/public/assets/bukti_fisik/', $fileName);

        $kepegawaian = ['id_user' => $id_user, 
                        'nip' => $request->nip,
                        'nidn' => $request->nidn,
                        'nomor_sk_cpns' => $request->nomor_sk_cpns, 
                        'sk_cpns_terhitung_mulai_tanggal' => $request->sk_cpns_terhitung_mulai_tanggal,
                        'nomor_sk_pns' => $request->nomor_sk_pns,
                        'tanggal_menjadi_pns' => $request->tanggal_menjadi_pns,
                        'sumber_gaji' => $request->sumber_gaji
        ];

        DB::table('kepegawaian')->insert($kepegawaian);

        $alamatKontak = ['id_user' => $id_user, 
                        'email' => $request->email,
                        'alamat' => $request->alamat, 
                        'rt' => $request->rt,
                        'rw' => $request->rw,
                        'dusun' => $request->dusun,
                        'desa_kabupaten' => $request->desa_kabupaten,
                        'kota_kabupaten' => $kota_kabupaten,
                        'provinsi' => $request->provinsi, 
                        'kode_pos' => $request->kode_pos,
                        'no_telepon_rumah' => $request->no_telepon_rumah,
                        'no_hp' => $request->no_hp
        ];

        DB::table('alamat_kontak')->insert($alamatKontak);

        $keluarga = [   'id_user' => $id_user, 
                        'nama_ibu_kandung' => $request->nama_ibu_kandung,
                        'status_perkawinan' => $request->status_perkawinan, 
                        'nama_suami_istri' => $request->nama_suami_istri,
                        'nip_suami_istri' => $request->nip_suami_istri,
                        'pekerjaan_suami_istri' => $request->pekerjaan_suami_istri,
                        'terhitung_mulai_tanggal_pns_suami_istri' => $request->terhitung_mulai_tanggal_pns_suami_istri
        ];

        DB::table('keluarga')->insert($keluarga);

        $lainLain = [   'id_user' => $id_user, 
                        'npwp' => $request->npwp,
                        'nama_wajib_pajak' => $request->nama_wajib_pajak
        ];

        DB::table('lain_lain')->insert($lainLain);

        return redirect('/dosen');

    }

    public function edit($id) {

        $data['title'] = 'Edit Dosen';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $user = DB::table('users')
        ->where('id_user', '=', $id)
        ->get();

        $kepegawaian = DB::table('kepegawaian')
        ->where('id_user', '=', $id)
        ->get();

        $alamatKontak = DB::table('alamat_kontak')
        ->where('id_user', '=', $id)
        ->get();

        $keluarga = DB::table('keluarga')
        ->where('id_user', '=', $id)
        ->get();

        $lainLain = DB::table('lain_lain')
        ->where('id_user', '=', $id)
        ->get();

        $data['users'] = $user[0];
        $data['kepegawaian'] = $kepegawaian[0];
        $data['alamatKontak'] = $alamatKontak[0];
        $data['keluarga'] = $keluarga[0];
        $data['lainLain'] = $lainLain[0];

        $data['id_user'] = $id;

        return view('dosen.edit', $data);
    }

    public function save(request $request) {

        // return $request->all();

            if ($request->image_file) {
                $fileName = time().'.'.$request->image_file->getClientOriginalExtension();
                $request['photo']    = $fileName;

                $password = bcrypt($request->password);
                $save = DB::table('users')
                            ->where('id_user', $request->id_user)
                            ->update([
                                'username' => $request->username, 
                                'password' => $password,
                                'password_readable' => $request->password, 
                                'jenis_kelamin' => $request->jenis_kelamin,
                                'tempat_lahir' => $request->tempat_lahir,
                                'tanggal_lahir' => $request->tanggal_lahir,
                                'agama' => $request->agama,
                                'kewarganegaraan' => $request->kewarganegaraan,
                                'is_admin' => 0,
                                'status_edit' => 0,
                                'photo' => $request->photo
                            ]);

                if ($save) {
                    if ($request->image_file) {
                        $request->image_file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                    }
                }
            }else{

                $password = bcrypt($request->password);
                $save = DB::table('users')
                            ->where('id_user', $request->id_user)
                            ->update([
                                'username' => $request->username, 
                                'password' => $password,
                                'password_readable' => $request->password, 
                                'jenis_kelamin' => $request->jenis_kelamin,
                                'tempat_lahir' => $request->tempat_lahir,
                                'tanggal_lahir' => $request->tanggal_lahir,
                                'agama' => $request->agama,
                                'kewarganegaraan' => $request->kewarganegaraan,
                                'is_admin' => 0,
                                'status_edit' => 0
                            ]);
            }

            $save = DB::table('kepegawaian')
                            ->where('id_user', $request->id_user)
                            ->update([
                                'nip' => $request->nip,
                                'nidn' => $request->nidn,
                                'nomor_sk_cpns' => $request->nomor_sk_cpns, 
                                'sk_cpns_terhitung_mulai_tanggal' => $request->sk_cpns_terhitung_mulai_tanggal,
                                'nomor_sk_pns' => $request->nomor_sk_pns,
                                'tanggal_menjadi_pns' => $request->tanggal_menjadi_pns,
                                'sumber_gaji' => $request->sumber_gaji
                            ]);

                $save = DB::table('alamat_kontak')
                            ->where('id_user', $request->id_user)
                            ->update([
                                'email' => $request->email,
                                'alamat' => $request->alamat, 
                                'rt' => $request->rt,
                                'rw' => $request->rw,
                                'dusun' => $request->dusun,
                                'desa_kabupaten' => $request->desa_kabupaten,
                                'kota_kabupaten' => $request->kota_kabupaten,
                                'provinsi' => $request->provinsi, 
                                'kode_pos' => $request->kode_pos,
                                'no_telepon_rumah' => $request->no_telepon_rumah,
                                'no_hp' => $request->no_hp
                            ]);

                $save = DB::table('keluarga')
                            ->where('id_user', $request->id_user)
                            ->update([
                                'nama_ibu_kandung' => $request->nama_ibu_kandung,
                                'status_perkawinan' => $request->status_perkawinan, 
                                'nama_suami_istri' => $request->nama_suami_istri,
                                'nip_suami_istri' => $request->nip_suami_istri,
                                'pekerjaan_suami_istri' => $request->pekerjaan_suami_istri,
                                'terhitung_mulai_tanggal_pns_suami_istri' => $request->terhitung_mulai_tanggal_pns_suami_istri
                            ]);

                $save = DB::table('lain_lain')
                            ->where('id_user', $request->id_user)
                            ->update([
                                'npwp' => $request->npwp,
                                'nama_wajib_pajak' => $request->nama_wajib_pajak
                            ]);
                            
        return redirect('/dosen');

    }

    public function drop(request $request) {

        $success = DB::table('users')->where('id_user', '=', $request->id_user)->delete();

    }
}
