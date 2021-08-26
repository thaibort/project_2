<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class login extends Controller
{
    public function getLogin(){
        return view('admin.login');
    }

    public function postLogin(Request $request){
//        if(Auth::attempt(['email' => $request -> input('email'),'pass' => $request -> input('pass')])
//        {
//            redirect('admin/home');
//        }
//        else
//        {
//            redirect('admin/login');
//        }
    }
}
