<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function getLogin(){
        return view('admin.login');
    }

    public function postLogin(Request $request){
        $email = $request -> input('email');
        $pass = $request -> input('pass');
//        dd($pass);
        if (Auth::guard('admin')->attempt([
            'email' => $email,
            'pass' => $pass
        ]))
        {
            return redirect()->route('home');
        }
        else {
            dd($pass);
            return redirect()->back()->with('error','Sai email hoặc mật khẩu');
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin');
    }
}
