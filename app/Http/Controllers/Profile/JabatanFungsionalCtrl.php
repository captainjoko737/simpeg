<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\MJabatanFungsional;
use DB;

class JabatanFungsionalCtrl extends Controller {
    
    public function index() {
                
        $data['title'] = 'Jabatan Fungsional';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;

        $queryJabatanFungsional  = MJabatanFungsional::query();
        $queryJabatanFungsional  = $queryJabatanFungsional->where('id_user', '=', $id_user);
        $queryJabatanFungsional  = $queryJabatanFungsional->orderBy('id_jabatan_fungsional', 'DESC');
        $resultJabatanFungsional = $queryJabatanFungsional->get();

        $data['jabatan_fungsional'] = $resultJabatanFungsional;

        return view('profile.jabatan_fungsional.index', $data);

    }

    public function add() {
                
        $data['title'] = 'Tambah Jabatan Fungsional';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        return view('profile.jabatan_fungsional.add', $data);

    }

    public function create(request $request) {                         

        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;

            $save = DB::table('jabatan_fungsional')->insert(
                [
                    'id_user' => $request->id_user, 
                    'jabatan_fungsional' => $request->jabatan_fungsional,
                    'nomor_sk' => $request->nomor_sk, 
                    'terhitung_mulai_tanggal' => $request->terhitung_mulai_tanggal,
                    'kelebihan_pengajaran' => $request->kelebihan_pengajaran,
                    'kelebihan_penelitian' => $request->kelebihan_penelitian,
                    'kelebihan_pengabdian_masyarakat' => $request->kelebihan_pengabdian_masyarakat,
                    'kelebihan_kegiatan_penunjang' => $request->kelebihan_kegiatan_penunjang,
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

        return redirect('/profile/jabatanFungsional');
    }

    public function edit($id_JabatanFungsional) {
                
        $data['title'] = 'Edit Jabatan Fungsional';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $jabatanFungsional = MJabatanFungsional::find($id_JabatanFungsional);

        $data['jabatanFungsional'] = $jabatanFungsional;
        $data['id_user'] = $id_user;

        return view('profile.jabatan_fungsional.edit', $data);

    }

    public function save(request $request) {
       
        // $update = MJabatanFungsional::where('id_jabatan_fungsional', '=', $request->id_jabatan_fungsional)
        //                 ->update([
        //                     'jabatan_fungsional' => $request->jabatan_fungsional,
        //                     'nomor_sk' => $request->nomor_sk,
        //                     'terhitung_mulai_tanggal' => $request->terhitung_mulai_tanggal,
        //                     'kelebihan_pengajaran' => $request->kelebihan_pengajaran,
        //                     'kelebihan_penelitian' => $request->kelebihan_penelitian,
        //                     'kelebihan_pengabdian_masyarakat' => $request->kelebihan_pengabdian_masyarakat,
        //                     'kelebihan_kegiatan_penunjang' => $request->kelebihan_kegiatan_penunjang,
        //                     ]);

        // return redirect('/profile/jabatanFungsional');

        if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;

                $save = DB::table('jabatan_fungsional')
                            ->where('id_jabatan_fungsional', $request->id_jabatan_fungsional)
                            ->update([
                                'jabatan_fungsional' => $request->jabatan_fungsional,
                                'nomor_sk' => $request->nomor_sk, 
                                'terhitung_mulai_tanggal' => $request->terhitung_mulai_tanggal,
                                'kelebihan_pengajaran' => $request->kelebihan_pengajaran,
                                'kelebihan_penelitian' => $request->kelebihan_penelitian,
                                'kelebihan_pengabdian_masyarakat' => $request->kelebihan_pengabdian_masyarakat,
                                'kelebihan_kegiatan_penunjang' => $request->kelebihan_kegiatan_penunjang,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc,
                                'bukti_fisik' => $request->bukti_fisik
                            ]);

                if ($save) {
                    if ($request->file) {
                        $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                    }
                }
            }else{

                $save = DB::table('jabatan_fungsional')
                            ->where('id_jabatan_fungsional', $request->id_jabatan_fungsional)
                            ->update([
                                'jabatan_fungsional' => $request->jabatan_fungsional,
                                'nomor_sk' => $request->nomor_sk, 
                                'terhitung_mulai_tanggal' => $request->terhitung_mulai_tanggal,
                                'kelebihan_pengajaran' => $request->kelebihan_pengajaran,
                                'kelebihan_penelitian' => $request->kelebihan_penelitian,
                                'kelebihan_pengabdian_masyarakat' => $request->kelebihan_pengabdian_masyarakat,
                                'kelebihan_kegiatan_penunjang' => $request->kelebihan_kegiatan_penunjang,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc,
                        ]);
            }

        return redirect('/profile/jabatanFungsional');

    }

    public function drop(request $request) {

        $jabatanFungsional = MJabatanFungsional::find($request->id_jabatan_fungsional);

        $success = $jabatanFungsional->delete();

    }


}
