<?php

namespace App\Http\Controllers\Pengabdian;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\MJabatanStruktural;

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

        return view('pengabdian.jabatan_struktural', $data);

    }

    public function tambahJabatanStruktural() {
                
        $data['title'] = 'Tambah Jabatan Struktural';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        return view('pengabdian.tambahJabatanStruktural', $data);

    }

    public function AddJabatanStruktural(request $request) {

        $jabatanStruktural = MJabatanStruktural::create($request->all());

        if ($jabatanStruktural) {
            return redirect('/pengabdian/jabatanStruktural');
        }else{
            return redirect('/pengabdian/jabatanStruktural/add');
        }
    }

    public function EditJabatanStruktural($id_jabatan_struktural) {
                
        $data['title'] = 'Edit Jabatan Struktural';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $jabatanStruktural = MJabatanStruktural::find($id_jabatan_struktural);

        $data['jabatanStruktural'] = $jabatanStruktural;
        $data['id_user'] = $id_user;

        return view('pengabdian.editJabatanStruktural', $data);

    }

    public function SaveJabatanStruktural(request $request) {

        $update = MJabatanStruktural::where('id_jabatan_struktural', '=', $request->id_jabatan_struktural)
                        ->update([
                            'jabatan_tugas' => $request->jabatan_tugas,
                            'kategori_kegiatan' => $request->kategori_kegiatan,
                            'nomor_sk_jabatan_struktural' => $request->nomor_sk_jabatan_struktural,
                            'terhitung_mulai_tanggal' => $request->terhitung_mulai_tanggal,
                            'lokasi_penugasan' => $request->lokasi_penugasan,
                            ]);

        return redirect('/pengabdian/jabatanStruktural');

    }

    public function deleteJabatanStruktural(request $request) {

        $jabatanStruktural = MJabatanStruktural::find($request->id_jabatan_struktural);

        $success = $jabatanStruktural->delete();

    }




}






























