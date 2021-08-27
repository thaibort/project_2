<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\adminModel;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function home() {
        return view('admin.component.home');
    }

    public function vocation() {
        $rs = adminModel::vocation();
        return view('admin.component.super.vocation.vocation-mng',['rs' => $rs]);
    }

    public function getCreateVocation() {
        return view('admin.component.super.vocation.create-vocation');
    }

    public function postCreateVocation(Request $request) {
        $name = $request -> input('name');
        $money = $request -> input('money');
        adminModel::postCreateVocation($name,$money);
        return redirect("admin/vocation");
    }
}
