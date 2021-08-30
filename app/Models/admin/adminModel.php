<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class adminModel extends Model
{
    use HasFactory;

    //ngành và tổng tiền
        static function vocation(){
            $rs = DB::table('total_money')
                ->join('vocation','total_money.idVocation','=','vocation.id')
                ->select('vocation.name','totalMoney','vocation.id')
                ->get();
            return $rs;
        }

        //thêm
            static function postCreateVocation($name,$money){
                DB::table('vocation')->insert(['name' => $name]);
                $id = DB::table('vocation')->where("name","like","%".$name."%")->get('id');
                foreach ($id as $item) {
                    $money = ['totalMoney' => $money, 'idVocation' => $item->id];
                    DB::table('total_money')->insert($money);
                }
            }

        //xóa
            static function deleteVocation($id){
                DB::table('total_money')
                    ->where('idVocation','=',$id)
                    ->delete();
                DB::table('vocation')
                    ->delete($id);
            }

        //sửa
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

    //niên khóa
        static function schoolYear(){
            $rs = DB::table('school_year')->get();
            return $rs;
        }

        //thêm
            static function postCreateSchoolYear($name,$stagesPresent){
            $data = ['name' => $name, 'stagesPresent' => $stagesPresent];
                DB::table('school_year')
                    ->insert($data);
            }

        //xóa
            static function deleteSchoolYear($id){
                DB::table('school_year')
                    ->delete($id);
            }

        //sửa
            static function goUpdateSchoolYear($id){
                $rs = DB::table('school_year')
                    ->where('id','=',$id)
                    ->get();
                return $rs;
            }
}
