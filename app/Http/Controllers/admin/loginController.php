<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function getLogin(){
        return view('admin.login');
    }

    public function postLogin(Request $request){
        $email = $request -> input('email');
        $pass = $request -> input('pass');

        if (Auth::guard('admin')->attempt([
            'email' => $email,
            'password' => $pass
        ]))
        {
            return redirect()->route('home');
        }
        else {
            return redirect()->back()->with('error','Sai email hoặc mật khẩu');
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin');
    }
}
