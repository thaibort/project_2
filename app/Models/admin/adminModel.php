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
            ->select('vocation.name','totalMoney')
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
}
