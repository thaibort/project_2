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

            static function updateSchoolYear($name,$stagesPresent){
                $data = ['name' => $name, 'stagesPresent' => $stagesPresent];
                DB::table('school_year')
                    ->update($data);
            }

    //lớp
        static function class(){
            $rs = DB::table('class')
                ->join('total_money','class.idTotalMoney','total_money.id')
                ->join('vocation','total_money.idVocation','vocation.id')
                ->join('school_year','class.idSchoolYear','school_year.id')
                ->select('class.id','class.name','vocation.name AS vocation','school_year.name AS schoolYear')
                ->get();
            return $rs;
        }

        static function getVocation(){
            $total = DB::table('total_money')
                ->join('vocation','total_money.idVocation','=','vocation.id')
                ->select('vocation.name','total_money.id as idTotal')
                ->get();

            return $total;
        }

        static function getSchoolYear(){
            $schyear = DB::table('school_year')
                ->select('id as idYear','name')
                ->get();
            return $schyear;
        }

        //thêm
            static function postCreateClass($data){
                DB::table('class')->insert($data);
            }

        //xóa
            static function deleteClass($id){
                DB::table('class')
                    ->delete($id);
            }

        //sửa
            static function goUpdateClass($id){
                $rs = DB::table('class')
                    ->where('id','=',$id)
                    ->get();
                return $rs;
            }

            static function updateClass($id,$data){
                DB::table('class')
                    ->where('id','=',$id)
                    ->update($data);
            }

    //học bổng
        static function scholarship(){
            $rs = DB::table('scholarship')
                ->get();
            return $rs;
        }

        //thêm
            static  function postCreateScholarship($data){
            DB::table('scholarship')
                ->insert($data);
    }

        //xóa
            static function deleteScholarship($id){
                DB::table('scholarship')
                    ->delete($id);
            }

        //sửa
            static function goUpdateScholarship($id){
                $rs = DB::table('scholarship')
                    ->where('id', '=', $id)
                    ->get();
                return $rs;
            }

            static function updateScholarship($id,$data){
                DB::table('scholarship')
                    ->where('id','=',$id)
                    ->update($data);
            }
}
