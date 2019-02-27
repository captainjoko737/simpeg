<?php

namespace App\Http\Controllers\PelaksanaanPendidikan;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\MPelaksanaanPendidikan;
use App\User;

class PelaksanaanPendidikanCtrl extends Controller {

    public function index() {
        
        $data['title'] = 'Pelaksanaan Pendidikan';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        $query  = MPelaksanaanPendidikan::query();
        $query  = $query->where('id_user', '=', $id_user);
        $query  = $query->orderBy('id_pelaksanaan_pendidikan', 'DESC');
        $result = $query->get();

        foreach ($result as $key => $value) {
            if ($value['semester'] == 0) {
                $result[$key]['semester'] = 'Genap';
            }else{
                $result[$key]['semester'] = 'Ganjil';
            }
        }

        // return $result;

        $data['result'] = $result;

        return view('pelaksanaanPendidikan.pelaksanaanPendidikan', $data);
    }

    public function add() {

        $data['title'] = 'Tambah Pelaksanaan Pendidikan';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        return view('pelaksanaanPendidikan.add', $data);
    }

    public function Create(request $request) {


            if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;
                $request['angka_kredit'] = $request['jumlah_sks'];

                $save = MPelaksanaanPendidikan::create($request->all());

                if ($save) {
                    if ($request->file) {
                        $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                    }
                }
            }

            return redirect('/pelaksanaan/pendidikan');
    }

    public function edit($id_pelaksanaan_pendidikan) {

        $data['title'] = 'Edit Pelaksanaan Pendidikan';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = MPelaksanaanPendidikan::find($id_pelaksanaan_pendidikan);

        $data['result'] = $result;
        $data['id_user'] = $id_user;

        return view('pelaksanaanPendidikan.edit', $data);
    }

    public function save(request $request) {

        if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;
                $request['angka_kredit'] = $request['jumlah_sks'];

                $save = MPelaksanaanPendidikan::where('id_pelaksanaan_pendidikan', '=', $request->id_pelaksanaan_pendidikan)
                        ->update([
                            'nama_pelaksanaan' => $request->nama_pelaksanaan,
                            'semester' => $request->semester,
                            'jumlah_sks' => $request->jumlah_sks,
                            'periode' => $request->periode,
                            'angka_kredit' => $request->angka_kredit,
                            'bukti_fisik' => $request->bukti_fisik,
                        ]);

                if ($save) {
                    if ($request->file) {
                        $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                    }
                }
            }else{
                $request['angka_kredit'] = $request['jumlah_sks'];

                $save = MPelaksanaanPendidikan::where('id_pelaksanaan_pendidikan', '=', $request->id_pelaksanaan_pendidikan)
                        ->update([
                            'nama_pelaksanaan' => $request->nama_pelaksanaan,
                            'semester' => $request->semester,
                            'jumlah_sks' => $request->jumlah_sks,
                            'periode' => $request->periode,
                            'angka_kredit' => $request->angka_kredit,
                        ]);
            }

        return redirect('/pelaksanaan/pendidikan');

    }

    public function delete(request $request) {

        $pelaksanaanPendidikan = MPelaksanaanPendidikan::find($request->id_pelaksanaan_pendidikan);

        $success = $pelaksanaanPendidikan->delete();

    }

}



























