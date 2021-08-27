<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class adminModel extends Model
{
    use HasFactory;
    static function vocation(){
        $rs = DB::table('total_money')
            ->join('vocation','total_money.idVocation','=','vocation.id')
            ->select('vocation.name','totalMoney','vocation.id')
            ->get();
        return $rs;
    }

    static function postCreateVocation($name,$money){
        DB::table('vocation')->insert(['name' => $name]);
        $id = DB::table('vocation')->where("name","like","%".$name."%")->get('id');
        foreach ($id as $item) {
            $money = ['totalMoney' => $money, 'idVocation' => $item->id];
            DB::table('total_money')->insert($money);
        }
    }

    static function deleteVocation($id){
        DB::table('total_money')
            ->where('idVocation','=',$id)
            ->delete();
        DB::table('vocation')
            ->delete($id);
    }

    static function goUpdateVocation($id){
        $rs = DB::table('total_money')
            ->join('vocation','total_money.idVocation','=','vocation.id')
            ->where('total_money.idVocation','=',$id)
            ->select('vocation.name','totalMoney','vocation.id')
            ->get();
        return $rs;
    }

    static function updateVocation($id,$money){
        DB::table('total_money')
            ->where('idVocation','=',$id)
            ->update(['totalMoney' => $money]);
    }
}
