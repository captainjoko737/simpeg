<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class AdminProdiCtrl extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
                
        $data['title'] = 'Admin Prodi';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;

        $admin = DB::table('users')
            ->join('prodi', 'prodi.id_prodi', '=', 'users.id_prodi')
            ->where('is_admin', '=', 1)
            ->get();

        // return $admin;
        $data['result'] = $admin;

        return view('admin.user.index', $data);

    }

    public function add() {
                
        $data['title'] = 'Tambah Admin Prodi';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        $prodi = DB::table('prodi')->get();


        $data['prodi'] = $prodi;

        return view('admin.user.add', $data);

    }

    public function create(request $request) {                         

        $password = bcrypt($request->password);

        $save = DB::table('users')->insert(
                [
                    'id_prodi' => $request->id_prodi, 
                    'username' => $request->username,
                    'password' => $password, 
                    'nama' => $request->nama,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'agama' => $request->agama,
                    'kewarganegaraan' => $request->kewarganegaraan,
                    'is_admin' => $request->is_admin
                ]
            );
        
        return redirect('/admin');
    }

    public function edit($id) {
                
        $data['title'] = 'Edit Admin Prodi';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;

        $admin = DB::table('users')
            ->where('id_user', '=', $id)
            ->get();

        $prodi = DB::table('prodi')->get();

        $data['result'] = $admin[0];
        $data['prodi'] = $prodi;

        // return $data;

        return view('admin.user.edit', $data);

    }

    public function save(request $request) {
       
        if ($request->password) {
            // return "ada";
            
            $password = bcrypt($request->password);

            $save = DB::table('users')
                    ->where('id_user', $request->id_user)
                    ->update([
                        'id_prodi' => $request->id_prodi, 
                        'username' => $request->username,
                        'password' => $password, 
                        'nama' => $request->nama,
                        'jenis_kelamin' => $request->jenis_kelamin,
                        'tempat_lahir' => $request->tempat_lahir,
                        'tanggal_lahir' => $request->tanggal_lahir,
                        'agama' => $request->agama,
                        'kewarganegaraan' => $request->kewarganegaraan,
                    ]);
        }else{
            // return "tidak ada";

            $save = DB::table('users')
                    ->where('id_user', $request->id_user)
                    ->update([
                        'id_prodi' => $request->id_prodi, 
                        'username' => $request->username,
                        'nama' => $request->nama,
                        'jenis_kelamin' => $request->jenis_kelamin,
                        'tempat_lahir' => $request->tempat_lahir,
                        'tanggal_lahir' => $request->tanggal_lahir,
                        'agama' => $request->agama,
                        'kewarganegaraan' => $request->kewarganegaraan,
                    ]);
        }

        return redirect('/admin');

    }

    public function drop(request $request) {

        $user = user::find($request->id_user);

        $success = $user->delete();

    }
}
