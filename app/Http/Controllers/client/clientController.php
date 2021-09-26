<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\client\clientModel;
use Illuminate\Http\Request;

class clientController extends Controller
{
    public function home(Request $request){
        $mode = $request -> input('mode');
        return view('client.home',['mode'=> $mode]);
    }

    public function showInvoice(Request $request){
        $mode = $request -> input('mode');
        $kw = $request -> input('kw');
        $rs = clientModel::showInvoice($kw);
        return view('client.invoice',['rs' => $rs,'kw' => $kw],['mode'=> $mode]);
    }

    public function totalInvoiceClient(Request $request){
        $id = $request -> input('id');
        $kw = $request -> input('kw');
        $rs = clientModel::totalInvoiceClient($id);
        $name = clientModel::getNameStudent($id);
        return view('client.total-invoice',['rs' => $rs, 'kw' => $kw, 'mode' => 0,'name' => $name]);
    }
}
