<?php

namespace App\Http\Controllers\Penelitian;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\MPenelitian;

class PenelitianCtrl extends Controller {
    
    public function index() {

        $data['title'] = 'Penelitian';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        $queryPenelititan  = MPenelitian::query();
        $queryPenelititan  = $queryPenelititan->where('id_user', '=', $id_user);
        $queryPenelititan  = $queryPenelititan->orderBy('id_penelitian', 'DESC');
        $resultPenelititan = $queryPenelititan->get();

        $data['penelitian'] = $resultPenelititan;

        return view('penelitian.penelitian', $data);

    }

    public function detailPenelitian($id_penelitian) {

        $data['title'] = 'Detail Penelitian';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        // $id_user = Auth::user()->id_user;
        $queryPenelititan  = MPenelitian::query();
        $queryPenelititan  = $queryPenelititan->where('id_penelitian', '=', $id_penelitian);
        $resultPenelititan = $queryPenelititan->get()->first();

        $data['penelitian'] = $resultPenelititan;

        return view('penelitian.detailPenelitian', $data);

    }

    public function tambahPenelitian() {
                
        $data['title'] = 'Tambah Penelitian';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        return view('penelitian.tambahPenelitian', $data);

    }

    public function AddPenelitian(request $request) {

        $penelitian = MPenelitian::create($request->all());

        if ($penelitian) {
            return redirect('/penelitian/penelitian');
        }else{
            return redirect('/penelitian/penelitian/add');
        }
    }

    public function EditPenelitian($id_penelitian) {
                
        $data['title'] = 'Edit Penelitian';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $penelitian = MPenelitian::find($id_penelitian);

        $data['penelitian'] = $penelitian;
        $data['id_user'] = $id_user;

        return view('penelitian.editPenelitian', $data);

    }

    public function SavePenelitian(request $request) {

        $update = MPenelitian::where('id_penelitian', '=', $request->id_penelitian)
                        ->update([
                            'judul_kegiatan' => $request->judul_kegiatan,
                            'kategori_kegiatan' => $request->kategori_kegiatan,
                            'lembaga_iptek' => $request->lembaga_iptek,
                            'kelompok_bidang' => $request->kelompok_bidang,
                            'jenis_skim' => $request->jenis_skim,
                            'lokasi_kegiatan' => $request->lokasi_kegiatan,
                            'tahun_usulan' => $request->tahun_usulan,
                            'tahun_kegiatan' => $request->tahun_kegiatan,
                            'tahun_pelaksanaan' => $request->tahun_pelaksanaan,
                            'lama_kegiatan' => $request->lama_kegiatan,
                            'tahun_pelaksanaan_ke' => $request->tahun_pelaksanaan_ke,
                            'dana_dari_dikti' => $request->dana_dari_dikti,
                            'dana_dari_perguruan_tinggi' => $request->dana_dari_perguruan_tinggi,
                            'dana_dari_institusi_lain' => $request->dana_dari_institusi_lain,
                            'in_kind' => $request->in_kind,
                            'nomor_sk_penugasan' => $request->nomor_sk_penugasan,
                            'tanggal_sk_penugasan' => $request->tanggal_sk_penugasan,
                            ]);

        return redirect('/penelitian/penelitian');

    }

    public function deletePenelitian(request $request) {

        $penelitian = MPenelitian::find($request->id_penelitian);

        $success = $penelitian->delete();

    }









}
