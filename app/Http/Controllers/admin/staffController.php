<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\adminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class staffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    //trang chủ
        public function home() {
            return view('admin.component.home');
        }

    //cập nhật thông tin nhân viên
        public function goUpdateStaff(){
            $id = session()->get('admin.id');
            $rs = adminModel::goUpdateStaff($id);
            return view('admin.component.super.staff.update-staff',['rs' => $rs]);
        }

        public function updateStaff(Request $request){
            $pass = $request -> input('oldPass');
            $newpass = $request -> input('newPass');
            if (!adminModel::checkPass($pass)){
                return redirect()->back()->with('err',"Mật Khẩu không đúng");
            }
            else{
                $passbc = bcrypt($newpass);
                $data = [
                    'name' => $request -> input('name'),
                    'email' => $request -> input('email'),
                    'phone' => $request -> input('phone'),
                    'address' => $request -> input('address'),
                    'password' => $passbc
                ];
                adminModel::updateStaff($data);
                return redirect()->back()->with('mes',"Lưu thành công");
            }
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

        //thêm
            public function checkInformation($id){
                $rs = adminModel::stuinfor($id);
                $type = adminModel::getTypeOfTuition();
                return view('admin.component.staff.invoice.check-information',['rs' => $rs, 'type' => $type]);
            }

            public function getCreateInvoice(Request $request){
                $id = $request -> input('id');
                $typeOfTuition = $request -> typeOfTuition;
                $rs = adminModel::stuinfor($id);
                $type = adminModel::getTypeOfTuitionById($typeOfTuition);
                $total = adminModel::caculator($id,$typeOfTuition);
                return view('admin.component.staff.invoice.create-invoice',['rs' => $rs,'total' => $total,'type' => $type]);
            }

            public function postCreateInvoice(Request $request){
                $student = $request -> input('id');
                $type = $request -> input('type');
                $data = [
                    'idStudents' => $request -> input('id'),
                    'idAdmin' => $request -> input('admin'),
                    'idTypeOfTuition' => $request -> input('type'),
                    'date' => $request -> input('date'),
                    'money' => $request -> input('money'),
                ];
                adminModel::postCreateInvoice($data,$student,$type);

                return redirect('admin/invoice');
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
}
