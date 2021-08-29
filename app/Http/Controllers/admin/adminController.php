<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\adminModel;
use Illuminate\Http\Request;

class adminController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth.admin');
//    }

    //trang chủ
    public function home() {
        return view('admin.component.home');
    }

    //ngành và tổng tiền
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

    public function deleteVocation($id){
        adminModel::deleteVocation($id);
        return redirect("admin/vocation");
    }

    public function goUpdateVocation($id){
        $rs = adminModel::goUpdateVocation($id);
        return view('admin.component.super.vocation.update-vocation',['rs' => $rs]);
    }

    public function updateVocation(Request $request){
        $id = $request -> input('id');
        $money = $request -> input('money');
        adminModel::updateVocation($id,$money);
        return redirect("admin/vocation");
    }
}
