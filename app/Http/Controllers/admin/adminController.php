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
                $id = $request -> input('id');
                $data = ['name' => $request-> input('name'),'stagesPresent'=> $request -> input('stagesPresent')];
                adminModel::updateSchoolYear($id,$data);
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

        public function stuinfor($id){
            $rs = adminModel::stuinfor($id);
            return view('admin.component.staff.student.student-information',['rs' => $rs]);
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
                'dob' => $request -> input('dob'),
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
                adminModel::deleteStudent($id);
                return redirect('admin/student');
            }

        //sửa
            public function goUpdateStudent($id){
                $class = adminModel::getClass();
                $scholarship = adminModel::getScholarship();
                $rs = adminModel::goUpdateStudent($id);
                return view('admin.component.staff.student.update-student',[
                    'rs' => $rs,
                    'class' => $class,
                    'scholarship' => $scholarship
                ]);
            }

            public function updateStudent(Request $request){
            $id = $request -> input('id');
            $data = [
                'name' => $request -> input('name'),
                'address' => $request -> input('address'),
                'phone' => $request -> input('phone'),
                'email' => $request -> input('email'),
                'gender' => $request -> input('gender'),
                'dob' => $request -> input('dob'),
                'idClass' => $request -> input('class'),
                'idScholarship' => $request -> input('scholarship'),
            ];
            adminModel::updateStudent($id,$data);
            return redirect('admin/student');
        }

    //nhân viên
        public function staff(){
            $rs = adminModel::staff();
            return view('admin.component.super.staff.staff-mng',['rs' => $rs]);
        }

        //kích hoạt tài khoản
            public function active($id,$active){
                $data = ['active' => $active];
                adminModel::active($id,$data);

                return redirect('admin/staff');
            }

        //thêm
            public function getCreateStaff(){
                return view('admin.component.super.staff.create-staff');
            }

            public function postCreateStaff(Request $request){
                $data = [
                    'name' => $request -> input('name'),
                    'email' => $request -> input('email'),
                    'phone' => $request -> input('phone'),
                    'address' => $request -> input('address'),
                    'password' => bcrypt($request -> input('pass')),
                    'active' => 0,
                    'level' => 1
                ];

                adminModel::postCreateStaff($data);

                return redirect('admin/staff');
            }

        //xóa
            public function deleteStaff($id){
                adminModel::deleteStaff($id);
                return redirect('admin/staff');
            }

    //hóa đơn
        public function invoice(){
            $rs = adminModel::invoice();
            return view('admin.component.staff.invoice.invoice-mng',['rs' => $rs]);
        }

        //tổng hóa đơn
            public function totalInvoiceDetail($id){
                $rs = adminModel::totalInvoiceDetail($id);
                $name = adminModel::getNameStudent($id);
                return view('admin.component.staff.invoice.total-invoice-detail',['rs' => $rs,'name' => $name]);
            }

        //hóa đơn chi tiết
            public function detailInvoice($id){
                $rs = adminModel::detailInvoice($id);
//                $name = adminModel::getNameStudent($id);
                $idstu = 0;
                $name = "";
                foreach ($rs as $res){
                    $name = $res -> name;
                    $idstu = $res -> idStudent;
                }
                return view('admin.component.staff.invoice.invoice-detail',[
                    'rs' => $rs,'name' => $name,'idstu' => $idstu
                ]);
            }

        //xóa
            public function deleteInvoice(Request $request){
                $id = $request -> input('id');
                $idStudent = $request -> input('idStudent');
                adminModel::deleteInvoice($id);
                return redirect("admin/toindetail/{$idStudent}");
            }
}
