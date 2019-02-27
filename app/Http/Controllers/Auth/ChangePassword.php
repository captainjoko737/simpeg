<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class ChangePassword extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $data['title'] = 'Ganti Password';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;

        $data['id_user'] = $id_user;

        return view('changePassword.index', $data);
    }

    public function save(Request $request) {

         $password = bcrypt($request->password);

         $save = DB::table('users')
                ->where('id_user', $request->id_user)
                ->update([
                    'password' => $password,
                    'password_readable' => $request->password
                ]);

        return redirect('/home');

    }

}
