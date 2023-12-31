<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginproses(Request $request){
        if (Auth::attempt($request->only('username','password'))) {
            return redirect('/');
        }
        
        return redirect('login');
    }

    public function register(){
        return view('register');
    }

    public function registeradmin(Request $request){
        Admin::create([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);

        return redirect('/login');
    }

    public function logout() {
        Auth::logout();

        return \redirect('login');
    }
}
