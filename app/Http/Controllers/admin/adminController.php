<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\adminModel;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    //trang chủ
        public function home() {
            return view('admin.component.home');
        }

    //ngành và tổng tiền
        public function vocation() {
            $rs = adminModel::vocation();
            return view('admin.component.super.vocation.vocation-mng',['rs' => $rs]);
        }

        //thêm
            public function getCreateVocation() {
                return view('admin.component.super.vocation.create-vocation');
            }

            public function postCreateVocation(Request $request) {
                $name = $request -> input('name');
                $money = $request -> input('money');
                adminModel::postCreateVocation($name,$money);
                return redirect("admin/vocation");
            }

        //xóa
            public function deleteVocation($id){
                adminModel::deleteVocation($id);
                return redirect("admin/vocation");
            }

        //sửa
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

    //năm học
        public function schoolYear(){
            $rs = adminModel::schoolYear();
            return view('admin.component.super.school_year.school-year-mng',['rs' => $rs]);
        }

        //thêm
            public function getCreateSchoolYear(){
                return view('admin.component.super.school_year.create-school-year');
            }

            public function postCreateSchoolYear(Request $request){
                $name = $request -> input('name');
                $stagesPresent = 1;
                adminModel::postCreateSchoolYear($name,$stagesPresent);
                return redirect("admin/schyear");
            }

        //xóa
            public function deleteSchoolYear($id){
                adminModel::deleteSchoolYear($id);
                return redirect('admin/schyear');
            }

        //sửa
            public function goUpdateSchoolYear($id){
                $rs = adminModel::goUpdateSchoolYear($id);
                return view('admin.component.super.school_year.update-school-year',['rs' => $rs]);
            }

            public function updateSchoolYear(Request $request){
                $name = $request -> input('id');
                $stagesPresent = $request -> input('stagesPresent');
                adminModel::updateSchoolYear($name,$stagesPresent);
                return redirect("admin/schyear");
            }

    //lớp
        public function class(){
            $rs = adminModel::class();
            return view('admin.component.staff.class.class-mng', ['rs' => $rs]);
        }

        //thêm
            public function getCreateClass(){
                $vocation = adminModel::getVocation();
                $schoolYear = adminModel::getSchoolYear();
                return view('admin.component.staff.class.create-class',['vocation' => $vocation,'schoolYear' => $schoolYear]);
            }

            public function postCreateClass(Request $request){
                $name = $request->input('name');
                $vocation = $request->input('vocation');
                $schoolYear = $request->input('schoolYear');

                $data = ['name' => $name, 'idTotalMoney' => $vocation, 'idSchoolYear' => $schoolYear];

                adminModel::postCreateClass($data);
                return redirect("admin/class");
            }

        //xóa
            public function deleteClass($id){
                adminModel::deleteClass($id);
                return redirect('admin/class');
            }

        //sửa
            public function goUpdateClass($id){
                $rs = adminModel::goUpdateClass($id);
                $vocation = adminModel::getVocation();
                $SchoolYear = adminModel::getSchoolYear();
                return view('admin.component.staff.class.update-class',["rs" => $rs, "vocation" => $vocation, "SchoolYear" => $SchoolYear]);
            }

            public function updateClass(Request $request){
                $id = $request -> input('id');
                $data = [
                    'name' => $request -> input('name'),
                    'idTotalMoney' => $request -> vocation,
                    'idSchoolYear' => $request -> schoolYear
                ];
                adminModel::updateClass($id,$data);

                return redirect('admin/class');
            }

    //học bổng
        public function scholarship(){
            $rs = adminModel::scholarship();
            return view('admin.component.super.scholarship.scholarship-mng',['rs' => $rs]);
        }

        //thêm
            public function getCreateScholarship(){
                return view('admin.component.super.scholarship.create-scholarship');
            }

            public function postCreateScholarship(Request $request){
                $data = [
                    'type' => $request -> input('name'),
                    'money' => $request -> input('money')
                    ];

                adminModel::postCreateScholarship($data);

                return redirect('admin/scholarship');
            }

        //xóa
            public function deleteScholarship($id){
                adminModel::deleteScholarship($id);
                return redirect('admin/scholarship');
            }

        //sửa
            public function goUpdateScholarship($id){
                $rs = adminModel::goUpdateScholarship($id);
                return view('admin.component.super.scholarship.update-scholarship',['rs' => $rs]);
            }

            public function updateScholarship(Request $request){
                $id = $request -> input('id');
                $data = [
                    'type' => $request -> input('name'),
                    'money' => $request -> input('money')
                ];
                adminModel::updateScholarship($id,$data);
                return redirect('admin/scholarship');
            }

    //sinh viên
        public function student(){
            $rs = adminModel::student();
            return view('admin.component.staff.student.student-mng',['rs' => $rs]);
        }

    //thêm
        public function getCreateStudent(){
            $class = adminModel::getClass();
            $scholarship = adminModel::getScholarship();
            return view('admin.component.staff.student.create-student',['class' => $class, 'scholarship' => $scholarship]);
        }

        public function postCreateStudent(Request $request){
        $data = [
            'name' => $request -> input('name'),
            'address' => $request -> input('address'),
            'phone' => $request -> input('phone'),
            'email' => $request -> input('email'),
            'gender' => $request -> input('gender'),
            'idClass' => $request -> input('class'),
            'idScholarship' => $request -> input('scholarship'),
            'totalStages' => 1
        ];

        adminModel::postCreateStudent($data);

        return redirect('admin/student');
    }

    //xóa
        public function deleteStudent($id){
        adminModel::deleteScholarship($id);
        return redirect('admin/scholarship');
    }

    //sửa
        public function goUpdateStudent($id){
            $rs = adminModel::goUpdateScholarship($id);
            return view('admin.component.super.scholarship.update-scholarship',['rs' => $rs]);
        }

        public function updateStudent(Request $request){
        $id = $request -> input('id');
        $data = [
            'type' => $request -> input('name'),
            'money' => $request -> input('money')
        ];
        adminModel::updateScholarship($id,$data);
        return redirect('admin/scholarship');
    }
}
