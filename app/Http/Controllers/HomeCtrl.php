<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeCtrl extends Controller {

    public function index() {

        $data['title'] = 'Home';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        return view('home.index', $data);
    }

}
