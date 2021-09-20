<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\client\clientModel;

class clientController extends Controller
{
    public function invoice(){
        $rs = clientModel::invoice();
        return view('client.home',['rs' => $rs]);
    }
}
