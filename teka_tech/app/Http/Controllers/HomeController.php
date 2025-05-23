<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller {
    public function index(){
        return view('home.homepage');
    }

    public function redirect(){
        $usertype = Auth::user()->usertype;

        if ($usertype == 0) {
            return view('admin.home');
        } else {
            return view('dashboard');
        }
    }
}
