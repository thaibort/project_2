<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\client\clientModel;
use Illuminate\Http\Request;

class clientController extends Controller
{
    public function home(Request $request){
        $kw = $request -> input('kw');
        $rs = clientModel::home($kw);
        return view('client.home',['rs' => $rs,'kw' => $kw]);
    }
}
