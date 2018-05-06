<?php

namespace App\Http\Controllers\Program;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class ProgramCtrl extends Controller {

    public function index() {

        $data['title'] = 'Mengembangkan Program Kuliah';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('program_kuliah')
        ->where('id_user', '=', $id_user)
        ->join('periode', 'periode.id_periode', '=', 'program_kuliah.periode')
        ->orderBy('program_kuliah.id_program_kuliah', 'DESC')
        ->get();

        $data['result'] = $result;

        return view('program.index', $data);
    }

    public function add() {

        $data['title'] = 'Tambah Program Kuliah';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        $periode = DB::table('periode')
        ->get();
        
        $data['periode'] = $periode;

        return view('program.add', $data);
    }

    public function Create(request $request) {

        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;

            $save = DB::table('program_kuliah')->insert(
                [
                    'id_user' => $request->id_user, 
                    'periode' => $request->periode,
                    'nama' => $request->nama,
                    'bukti_fisik_desc' => $request->bukti_fisik_desc,
                    'bukti_fisik' => $request->bukti_fisik
                ]
            );

            if ($save) {
                if ($request->file) {
                    $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                }
                session()->flash('message', 'Data Berhasil dibuat');
                return redirect('/program/kuliah');
            }else{
                session()->flash('error', 'Terjadi Kesalahan');
                return redirect('/program/kuliah');
            }
        }

        return redirect('/program/kuliah');

    }

    public function edit($id) {

        $data['title'] = 'Edit Program Kuliah';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('program_kuliah')
        ->join('periode', 'periode.id_periode', '=', 'program_kuliah.periode')
        ->where('program_kuliah.id_program_kuliah', '=', $id)
        ->get();

        $periode = DB::table('periode')
        ->get();
        
        $data['periode'] = $periode;

        $data['result'] = $result[0];
        $data['id_user'] = $id_user;

        return view('program.edit', $data);
    }

    public function save(request $request) {

            if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;

                $save = DB::table('program_kuliah')
                            ->where('id_program_kuliah', $request->id_program_kuliah)
                            ->update([
                                'periode' => $request->periode,
                                'nama' => $request->nama,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc,
                                'bukti_fisik' => $request->bukti_fisik
                            ]);

                if ($save) {
                    if ($request->file) {
                        $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                    }
                }
            }else{

                $save = DB::table('program_kuliah')
                            ->where('id_program_kuliah', $request->id_program_kuliah)
                            ->update([
                                'periode' => $request->periode,
                                'nama' => $request->nama
                        ]);
            }

            if ($save) {
                session()->flash('message', 'Data Berhasil diubah');
                return redirect('/program/kuliah');
            }else{
                session()->flash('error', 'Terjadi Kesalahan');
                return redirect('/program/kuliah');
            }

        return redirect('/program/kuliah');

    }

    public function drop(request $request) {

        $success = DB::table('program_kuliah')->where('id_program_kuliah', '=', $request->id_program_kuliah)->delete();

    }

}
