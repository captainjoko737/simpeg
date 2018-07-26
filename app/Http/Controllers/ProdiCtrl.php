<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class ProdiCtrl extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index() {
                
        $data['title'] = 'Prodi';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;

        $prodi = DB::table('prodi')
            ->get();

        // return $admin;
        $data['result'] = $prodi;

        return view('admin.prodi.index', $data);

    }

    public function add() {
                
        $data['title'] = 'Tambah Prodi';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        $prodi = DB::table('prodi')->get();

        $data['prodi'] = $prodi;

        return view('admin.prodi.add', $data);

    }

    public function create(request $request) {                         

        $password = bcrypt($request->password);

        $save = DB::table('prodi')->insert(
                [
                    'kode_prodi' => $request->kode_prodi,
                    'nama_prodi' => $request->nama_prodi,
                ]
            );
        
        return redirect('/prodi');
    }

    public function edit($id) {
                
        $data['title'] = 'Edit Prodi';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;

        $prodi = DB::table('prodi')
            ->where('id_prodi', '=', $id)
            ->get();

        $data['result'] = $prodi[0];

        // return $data;

        return view('admin.prodi.edit', $data);

    }

    public function save(request $request) {
       
        $save = DB::table('prodi')
                ->where('id_prodi', $request->id_prodi)
                ->update([
                    'kode_prodi' => $request->kode_prodi,
                    'nama_prodi' => $request->nama_prodi, 
                ]);

        return redirect('/prodi');

    }

    public function drop(request $request) {

        DB::table('prodi')->where('id_prodi', '=', $request->id_prodi)->delete();

    }
}
