<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

                $rs1 = DB::table('total_money')
                    ->where('idVocation','=',$id)
                    ->get();
                foreach ($rs1 as $res1){
                    $rs2 = DB::table('class')
                        ->where('idTotalMoney','=',$res1 -> id)
                        ->get();
                    foreach ($rs2 as $res2){
                        $rs3 = DB::table('students')
                            ->where('idClass','=',$res2 -> id)
                            ->get();
                        foreach ($rs3 as $res3){
                            DB::table('invoices')
                                ->where('idStudents','=',$res3 -> id)
                                ->delete();
                        }
                        DB::table('students')
                            ->where('idClass','=',$res2 -> id)
                            ->delete();
                    }
                    DB::table('class')
                        ->where('idTotalMoney','=',$res1 -> id)
                        ->delete();
                }

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

            static function updateVocation($id,$money,$vocation){
                DB::table('total_money')
                    ->where('idVocation','=',$id)
                    ->update($money);
                DB::table('vocation')
                    ->where('id','=',$id)
                    ->update($vocation);
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

                $rs1 = DB::table('school_year')
                    ->where('id','=',$id)
                    ->get();

                foreach ($rs1 as $res1){
                    $rs2 = DB::table('class')
                        ->where('idSchoolYear','=',$res1 -> id)
                        ->get();
                    foreach ($rs2 as $res2){
                        $rs3 = DB::table('students')
                            ->where('idClass','=',$res2 -> id)
                            ->get();
                        foreach ($rs3 as $res3){
                            DB::table('invoices')
                                ->where('idStudents','=',$res3 -> id)
                                ->delete();
                        }
                        DB::table('students')
                            ->where('idClass','=',$res2 -> id)
                            ->delete();
                    }
                    DB::table('class')
                        ->where('idSchoolYear','=',$res1 -> id)
                        ->delete();
                }

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

            static function updateSchoolYear($id,$data){
                DB::table('school_year')
                    ->where('id','=',$id)
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

    //sinh viên
        static function student(){
            $rs = DB::table('students')
                ->join('class','students.idClass','=','class.id')
                ->join('school_year','class.idSchoolYear','=','school_year.id')
                ->join('scholarship','students.idScholarship','=','scholarship.id')
                ->select(
                    'students.id',
                    'students.name as studentName',
                    'class.name as className',
                    'school_year.name as schoolYear',
                    'school_year.stagesPresent',
                    'students.totalStages')
                ->get();
            return $rs;
        }

        static function stuinfor($id){
            $rs = DB::table('students')
                ->join('class','students.idClass','=','class.id')
                ->join('school_year','class.idSchoolYear','=','school_year.id')
                ->join('total_money','class.idTotalMoney','=','total_money.id')
                ->join('vocation','total_money.idVocation','=','vocation.id')
                ->join('scholarship','students.idScholarship','=','scholarship.id')
                ->select(
                    'students.id',
                    'students.name as studentName',
                    'students.phone',
                    'students.email',
                    'students.address',
                    'students.dob',
                    'students.gender',
                    'scholarship.money as scholarship',
                    'class.name as className',
                    'school_year.name as schoolYear',
                    'school_year.stagesPresent',
                    'vocation.name as vocation',
                    'students.totalStages'
                )
                ->where('students.id','=',$id)
                ->get();
            return $rs;
        }

        static function getClass(){
            $rs = DB::table('class')
                ->get();
            return $rs;
        }

        static function getScholarship(){
            $rs = DB::table('scholarship')
                ->get();

            return $rs;
        }

        //thêm
            static function postCreateStudent($data){
                DB::table('students')
                    ->insert($data);
            }

        //xóa
            static function deleteStudent($id){
                DB::table('students')
                    ->delete($id);
            }

        //sửa
            static function goUpdateStudent($id){
                $rs = DB::table('students')
                    ->where('id','=',$id)
                    ->get();
                return $rs;
            }

            static function updateStudent($id,$data){
                DB::table('students')
                    ->where('id','=',$id)
                    ->update($data);
            }

    //nhân viên
        static function staff(){
            $rs = DB::table('admins')
                ->where('level','=',1)
                ->get();
            return $rs;
        }

        static function staffInformation($id){
            $rs = DB::table('admins')
                ->where('id','=',$id)
                ->get();
            return $rs;
        }

        //kích hoạt tài khoản
            static function active($id,$data){
                DB::table('admins')
                    ->where('id','=',$id)
                    ->update($data);
            }

        //thêm
            static function postCreateStaff($data){
                DB::table('admins')
                    ->insert($data);
            }

        //xóa
            static function deleteStaff($id){
                DB::table('admins')
                    ->delete($id);
            }

        //sửa
            static function goUpdateStaff($id){
                $rs = DB::table('admins')
                    ->where('id','=',$id)
                    ->get();
                return $rs;
            }

            static function checkPass($pass){
                $oldpass = DB::table('admins')
                    ->where('id','=',session()->get('admin.id'))
                    ->get();
                $oldd = '';
                foreach ($oldpass as $old){
                    $oldd = $old->password;
                }
                return Hash::check($pass,$oldd);
            }

            static function updateStaff($data){
                DB::table('admins')
                    ->where('id','=',session()->get('admin.id'))
                    ->update($data);
            }

    //hóa đơn
        static function invoice(){
            $rs = DB::table('students')
                ->join('class','students.idClass','=','class.id')
                ->join('total_money','class.idTotalMoney','=','total_money.id')
                ->join('vocation','total_money.idVocation','=','vocation.id')
                ->join('school_year','class.idSchoolYear','=','school_year.id')
                ->select(
                    'students.id',
                    'vocation.name as vocation',
                    'school_year.name as schoolYear',
                    'students.name',
                    'class.name as className',
                    'school_year.stagesPresent',
                    'students.totalStages')
                ->orderBy('vocation.name','asc')
                ->orderBy('school_year.name','asc')
                ->orderBy('class.name','asc')
                ->orderBy('students.name','asc')
                ->get();

            return $rs;
        }

        static function getNameStudent($id){
            $rs = DB::table('students')
                ->select('name')
                ->where('id','=',$id)
                ->get();
            return $rs;
        }

        static function getIdStu($id){
            $rs = DB::table('invoices')
                ->select('idStudents')
                ->where('id','=',$id)
                ->get();
            return $rs;
        }

        static function getTypeOfTuition(){
            $rs = DB::table('type_of_tuition')
                ->get();
            return $rs;
        }

        //tổng hóa đơn
            static function totalInvoiceDetail($id){
            $rs = DB::table('invoices')
                ->join('students','invoices.idStudents','=','students.id')
                ->join('type_of_tuition','invoices.idTypeOfTuition','=','type_of_tuition.id')
                ->select(
                    'invoices.id',
                    'students.id as idStudent',
                    'students.name as name',
                    'type_of_tuition.name as typeOfTuition',
                    'invoices.money',
                    'invoices.date',
                )
                ->where('students.id','=',$id)
                ->get();

            return $rs;
        }

        //hóa đơn chi tiết
            static function detailInvoice($id){
                $rs = DB::table('invoices')
                    ->join('students','invoices.idStudents','=','students.id')
                    ->join('class','students.idClass','=','class.id')
                    ->join('school_year','class.idSchoolYear','=','school_year.id')
                    ->join('total_money','class.idTotalMoney','=','total_money.id')
                    ->join('vocation','total_money.idVocation','=','vocation.id')
                    ->join('type_of_tuition','invoices.idTypeOfTuition','=','type_of_tuition.id')
                    ->join('admins','invoices.idAdmin','=','admins.id')
                    ->select(
                        'invoices.id',
                        'students.id as idStudent',
                        'students.name as name',
                        'students.email',
                        'students.phone',
                        'students.gender',
                        'students.address',
                        'students.dob',
                        'admins.name as admin',
                        'class.name as className',
                        'vocation.name as vocation',
                        'school_year.name as schoolYear',
                        'type_of_tuition.name as typeOfTuition',
                        'invoices.money',
                        'invoices.date',
                    )
                    ->where('invoices.id','=',$id)
                    ->get();
                return $rs;
            }

            static function limitYear(){
                $rs = DB::table('school_year')
                    ->orderBy('name','asc')
                    ->get();

                $k = 0;

                foreach ($rs as $res){
                    $k = ($res -> name) - 3;
                }

                return $k;
            }

        //foem tăng đợt
            static function stageForm(){
                $k = self::limitYear();
                $rs = DB::table('school_year')
                    ->where('name','>',$k)
                    ->get();
                return $rs;
            }

            static function PostStageForm($data,$mode){
                if ($mode == 1) {
                    DB::table('stage_form')
                        ->insert($data);
                }
                $k = self::limitYear();
                $rs = DB::table('school_year')
                    ->where('name','>',$k)
                    ->get();


                foreach ($rs as $res){
                    $data1 = [];
                    if ($mode == 1) {
                        $data1 = [
                            'stagesPresent' => $res->stagesPresent + 1
                        ];
                    }
                    if ($mode == 0){
                        $data1 = [
                            'stagesPresent' => $res->stagesPresent - 1
                        ];
                    }
                    DB::table('school_year')
                        ->where('id', '=', $res->id)
                        ->update($data1);
                }
            }

            //xóa
                static function deleteInvoice($id){
                    $rs = DB::table('invoices')
                        ->join('type_of_tuition','invoices.idTypeOfTuition','=','type_of_tuition.id')
                        ->join('students','invoices.idStudents','=','students.id')
                        ->where('invoices.id','=',$id)
                        ->select(
                            'type_of_tuition.stage',
                            'students.id',
                            'students.totalStages'
                        )
                        ->get();
                    foreach ($rs as $res){
                        $totalStages = $res -> totalStages;
                        $stage = $res -> stage;
                        $idStu = $res -> id;
                        $data = ['totalStages' => ($totalStages - $stage)];
                        DB::table('students')
                            ->where('id','=',$idStu)
                            ->update($data);
                        DB::table('invoices')
                            ->delete($id);
                    }
                }

        //thêm
            static function caculator($id,$typeOfTuition){
                $rs1 = DB::table('students')
                    ->join('class','students.idClass','=','class.id')
                    ->join('total_money','class.idTotalMoney','=','total_money.id')
                    ->join('scholarship','students.idScholarship','=','scholarship.id')
                    ->select(
                        'total_money.totalMoney',
                        'scholarship.money as scholarship',
                    )
                    ->where('students.id','=',$id)
                    ->get();
                $rs2 = DB::table('type_of_tuition')
                    ->where('id','=',$typeOfTuition)
                    ->get();
                $totalMoney = 0;
                $discount = 0;
                $stage = 0;

                foreach ($rs2 as $res){
                    $discount = $res -> discount / 100;
                    $stage = $res -> stage;
                }

                foreach ($rs1 as $res){
                    $totalMoney = $res -> totalMoney - $res -> scholarship;
                }

                $total =  $totalMoney - ($totalMoney * $discount);

                $final = round($total / 30 * $stage, 0, PHP_ROUND_HALF_UP);

                return $final;
            }

            static function getTypeOfTuitionById($id){
                $rs = DB::table('type_of_tuition')
                    ->where('id','=',$id)
                    ->get();
                return $rs;
            }

            static function postCreateInvoice($data,$student,$type){
                DB::table('invoices')
                    ->insert($data);

                $typeOf = DB::table('type_of_tuition')
                    ->where('id','=',$type)
                    ->get();

                $stu = DB::table('students')
                    ->where('id','=',$student)
                    ->get();

                $thisStage = 0;
                $chooseStage = 0;
                foreach ($stu as $rs){
                    $thisStage = $rs -> totalStages;
                }
                foreach ($typeOf as $rs){
                    $chooseStage = $rs -> stage;
                }

                $stage = ['totalStages' => $thisStage + $chooseStage];

                DB::table('students')
                    ->where('id','=',$student)
                    ->update($stage);
            }
}
