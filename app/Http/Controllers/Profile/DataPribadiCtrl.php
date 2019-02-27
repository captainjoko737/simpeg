<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\MKepegawaian;
use App\Models\MAlamatKontak;
use App\Models\MKeluarga;
use App\Models\MLainLain;
use DB;

use Illuminate\Support\Facades\Validator;


class DataPribadiCtrl extends Controller {

    public function index() {
        
        $data['title'] = 'Data Pribadi';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        $queryProfile  = User::query();
        $queryProfile  = $queryProfile->join('alamat_kontak', 'alamat_kontak.id_user', '=', 'users.id_user');
        $queryProfile  = $queryProfile->join('kepegawaian', 'kepegawaian.id_user', '=', 'users.id_user');
        $queryProfile  = $queryProfile->join('keluarga', 'keluarga.id_user', '=', 'users.id_user');
        $queryProfile  = $queryProfile->join('lain_lain', 'lain_lain.id_user', '=', 'users.id_user');
        $queryProfile  = $queryProfile->where('users.id_user', '=', $id_user);
        $resultProfile = $queryProfile->get()->first();

        $queryPendidikanFormal = DB::table('pendidikan_formal')
        ->where('id_user', '=', $id_user)
        ->get();

        $queryProdi = DB::table('prodi')
        ->where('id_prodi', '=', Auth::user()->id_prodi)
        ->get();

        if (!$resultProfile) {
        	$id_user = Auth::user()->id_user;
        	$queryProfile  = User::query();
        	$queryProfile  = $queryProfile->where('id_user', '=', $id_user);
        	$resultProfile = $queryProfile->get()->first();
        }

        $data['pendidikan_formal']  = $queryPendidikanFormal;
       	$data['profile']            = $resultProfile;
        $data['prodi']              = $queryProdi[0];

        // return $data;

        return view('profile.data_pribadi', $data);

    }

    public function editProfile($id_user, $id_edit) {

        $data['title'] = 'Edit Profile';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        // $id_user = Auth::user()->id_user;
        $queryProfile  = User::query();
        $queryProfile  = $queryProfile->where('id_user', '=', $id_user);
        $resultProfile = $queryProfile->get()->first();

        $queryKepegawaian  = MKepegawaian::query();
        $queryKepegawaian  = $queryKepegawaian->where('id_user', '=', $id_user);
        $resultKepegawaian = $queryKepegawaian->get()->first();

        $queryAlamat  = MAlamatKontak::query();
        $queryAlamat  = $queryAlamat->where('id_user', '=', $id_user);
        $resultAlamat = $queryAlamat->get()->first();

        $queryKeluarga  = MKeluarga::query();
        $queryKeluarga  = $queryKeluarga->where('id_user', '=', $id_user);
        $resultKeluarga = $queryKeluarga->get()->first();

        $queryLainLain  = MLainLain::query();
        $queryLainLain  = $queryLainLain->where('id_user', '=', $id_user);
        $resultLainLain = $queryLainLain->get()->first();
        
        $data['success'] = 0;
        $data['lain_lain']   = $resultLainLain;
        $data['keluarga']    = $resultKeluarga;
        $data['alamat']      = $resultAlamat;
        $data['kepegawaian'] = $resultKepegawaian;
        $data['profile']     = $resultProfile;
        $data['id_edit']     = $id_edit;

        return view('profile.editProfile', $data);
    }

    public function SaveProfile(request $request) {

        $id_edit = $request['id_edit'];

        if ($id_edit == 1) {

            if ($request->image_file) {
                $imageName = time().'.'.$request->image_file->getClientOriginalExtension();
                $request['photo']    = $imageName;

                $update = User::where('id_user', '=', $request->id_user)
                        ->update([
                            'username' => $request->username,
                            'jenis_kelamin' => $request->jenis_kelamin,
                            'tempat_lahir' => $request->tempat_lahir,
                            'tanggal_lahir' => $request->tanggal_lahir,
                            'agama' => $request->agama,
                            'kewarganegaraan' => $request->kewarganegaraan,
                            'photo' => $request->photo,
                            'tempat_lahir' => $request->tempat_lahir,
                            ]);
            }else{

                $update = User::where('id_user', '=', $request->id_user)
                        ->update([
                            'username' => $request->username,
                            'jenis_kelamin' => $request->jenis_kelamin,
                            'tempat_lahir' => $request->tempat_lahir,
                            'tanggal_lahir' => $request->tanggal_lahir,
                            'agama' => $request->agama,
                            'kewarganegaraan' => $request->kewarganegaraan,
                            'tempat_lahir' => $request->tempat_lahir,
                            ]);
                
            }

            
            if ($update) {
                if ($request->image_file) {
                    $request->image_file->move(base_path().'/public/assets/photo_profile/', $imageName);
                }
            }

            return redirect('/profile/dataPribadi');

            

        }else if ($id_edit == 2) {
            
            $update = MKepegawaian::where('id_user', '=', $request->id_user)
                        ->update([
                            'nip' => $request->nip,
                            'nidn' => $request->nidn,
                            'nomor_sk_cpns' => $request->nomor_sk_cpns,
                            'sk_cpns_terhitung_mulai_tanggal' => $request->sk_cpns_terhitung_mulai_tanggal,
                            'nomor_sk_pns' => $request->nomor_sk_pns,
                            'tanggal_menjadi_pns' => $request->tanggal_menjadi_pns,
                            'sumber_gaji' => $request->sumber_gaji,
                            ]);

            return redirect('/profile/dataPribadi');

        }else if ($id_edit == 3) {
         
            $update = MAlamatKontak::where('id_user', '=', $request->id_user)
                        ->update([
                            'email' => $request->email,
                            'alamat' => $request->alamat,
                            'rt' => $request->rt,
                            'rw' => $request->rw,
                            'dusun' => $request->dusun,
                            'desa_kabupaten' => $request->desa_kabupaten,
                            'kota_kabupaten' => $request->email,
                            'provinsi' => $request->alamat,
                            'kode_pos' => $request->rt,
                            'no_telepon_rumah' => $request->rw,
                            'no_hp' => $request->dusun,
                            ]);

            return redirect('/profile/dataPribadi');

        }else if ($id_edit == 4) {

            $update = MKeluarga::where('id_user', '=', $request->id_user)
                    ->update([
                        'nama_ibu_kandung' => $request->nama_ibu_kandung,
                        'status_perkawinan' => $request->status_perkawinan,
                        'nama_suami_istri' => $request->nama_suami_istri,
                        'nip_suami_istri' => $request->nip_suami_istri,
                        'pekerjaan_suami_istri' => $request->pekerjaan_suami_istri,
                        'terhitung_mulai_tanggal_pns_suami_istri' => $request->terhitung_mulai_tanggal_pns_suami_istri,
                        ]);

            return redirect('/profile/dataPribadi');

        }else if ($id_edit == 5) {
            
            $update = MLainLain::where('id_user', '=', $request->id_user)
                    ->update([
                        'npwp' => $request->npwp,
                        'nama_wajib_pajak' => $request->nama_wajib_pajak,
                        ]);

            return redirect('/profile/dataPribadi');
        }
    }

}



















































