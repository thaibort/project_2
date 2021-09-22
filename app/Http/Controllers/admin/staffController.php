<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\adminModel;
use Illuminate\Database\QueryException;
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
            $student = adminModel::countStudent();
            $class = adminModel::countClass();
            $year = adminModel::countYear();
            $paid = adminModel::countPaid();
//            $unpaid = adminModel::countUnpaid();
            return view('admin.component.home',['student' => $student,'class' => $class,'year' => $year, 'paid' => $paid]);
        }

    //cập nhật thông tin nhân viên
        public function staffInformation(){
            $id = session()->get('admin.id');
            $rs = adminModel::staffInformation($id);
            return view('admin.component.super.staff.staff-information',['rs' => $rs]);
        }

        public function goUpdateStaff(){
            $id = session()->get('admin.id');
            $rs = adminModel::goUpdateStaff($id);
            return view('admin.component.super.staff.update-staff',['rs' => $rs]);
        }

        public function updateStaff(Request $request){
            $pass = $request -> input('oldPass');
            $newpass = $request -> input('newPass');
            $data = [];
            if ($pass != "") {
                if (!adminModel::checkPass($pass)) {
                    return redirect()->back()->with('error', "Mật cũ Khẩu không đúng");
                } else {
                    $npass = bcrypt($newpass);
                    $data = [
                        'name' => $request->input('name'),
                        'email' => $request->input('email'),
                        'phone' => $request->input('phone'),
                        'address' => $request->input('address'),
                        'password' => $npass
                    ];
                }
            }
            else{
                $data = [
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'address' => $request->input('address')
                ];
            }
            try {
                adminModel::updateStaff($data);
            } catch (QueryException $ex) {
                if ($ex->errorInfo[2] == "Duplicate entry '" . $request->input('phone') . "' for key 'admins_phone_unique'") {
                    return back()->with('error', 'Số điện thoại đã tồn tại');
                }
                if ($ex->errorInfo[2] == "Duplicate entry '" . $request->input('email') . "' for key 'admins_email_unique'") {
                    return back()->with('error', 'Email đã tồn tại');
                }
            }
            return redirect()->back()->with('message', "Lưu thành công");
        }

    //hóa đơn
        public function invoice($mode){
            $rs = adminModel::invoice($mode);
            return view('admin.component.staff.invoice.invoice-mng',['rs' => $rs,'mode' => $mode]);
        }

        //tổng hóa đơn
            public function totalInvoiceDetail(Request $request){
                $id = $request -> input('id');
                $mode = $request -> input('mode');
                $rs = adminModel::totalInvoiceDetail($id);
                $name = adminModel::getNameStudent($id);
                return view('admin.component.staff.invoice.total-invoice-detail',['rs' => $rs,'name' => $name,'mode' => $mode]);
            }

        //hóa đơn chi tiết
            public function detailInvoice(Request $request){
                $id = $request -> input('id');
                $mode = $request -> input('mode');
                $rs = adminModel::detailInvoice($id);
                $idstu = 0;
                $name = "";
                foreach ($rs as $res){
                    $name = $res -> name;
                    $idstu = $res -> idStudent;
                }
                return view('admin.component.staff.invoice.invoice-detail',[
                    'rs' => $rs,'name' => $name,'idstu' => $idstu,'mode' => $mode
                ]);
            }

        //xóa
            public function deleteInvoice(Request $request){
            $id = $request -> input('id');
            $idStudent = $request -> input('idStudent');
            adminModel::deleteInvoice($id);
            return redirect("admin/toindetail/{$idStudent}")->with('message','Xóa thành công');
        }

        //thêm
            public function checkInformation(Request $request){
                $id = $request -> input('id');
                $mode = $request -> input('mode');
                $rs = adminModel::stuinfor($id);
                $type = adminModel::getTypeOfTuition();
                return view('admin.component.staff.invoice.check-information',['rs' => $rs, 'type' => $type,'mode' => $mode]);
            }

            public function getCreateInvoice(Request $request){
                $mode = $request -> input('mode');
                $id = $request -> input('id');
                $typeOfTuition = $request -> typeOfTuition;
                $rs = adminModel::stuinfor($id);
                $type = adminModel::getTypeOfTuitionById($typeOfTuition);
                $total = adminModel::caculator($id,$typeOfTuition);
                return view('admin.component.staff.invoice.create-invoice',['rs' => $rs,'total' => $total,'type' => $type,'mode' => $mode]);
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

                return redirect('admin/invoice')->with('message','Thêm thành công');
            }
        //form tăng đợt
            public function stageForm(){
                $rs = adminModel::stageForm();
                return view('admin.component.staff.invoice.formStage',['rs' => $rs]);
            }

            public function PostStageForm(Request $request){
                $mode = $request -> input('mode');
                $data = [];
                if ($mode == 1) {
                    $data = [
                        'nameAdmin' => session()->get('admin.name'),
                        'start' => $request->input('start'),
                        'end' => $request->input('end')
                    ];
                }

                adminModel::PostStageForm($data,$mode);
                if ($mode == 1){
                    return redirect('admin/invoice')->with('message','Tạo thành công');
                }
                if ($mode == 0){
                    return redirect('admin/schyear')->with('message','Tạo thành công');
                }
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

                try {
                    adminModel::postCreateStudent($data);
                }
                catch(QueryException $ex){
                    if ($ex->errorInfo[2] == "Duplicate entry '".$request -> input('phone')."' for key 'students_phone_unique'"){
                        return back()->with('error','Số điện thoại đã tồn tại');
                    }
                    if ($ex->errorInfo[2] == "Duplicate entry '".$request -> input('email')."' for key 'students_email_unique'"){
                        return back()->with('error','Email đã tồn tại');
                    }
                }

            return redirect('admin/student')->with('message','Thêm thành công');
        }

        //xóa
            public function deleteStudent($id){
            adminModel::deleteStudent($id);
            return redirect('admin/student')->with('message','Xóa thành công');
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
                try {
                    adminModel::updateStudent($id,$data);
                }
                catch(QueryException $ex){
                    if ($ex->errorInfo[2] == "Duplicate entry '".$request -> input('phone')."' for key 'students_phone_unique'"){
                        return back()->with('error','Số điện thoại đã tồn tại');
                    }
                    if ($ex->errorInfo[2] == "Duplicate entry '".$request -> input('email')."' for key 'students_email_unique'"){
                        return back()->with('error','Email đã tồn tại');
                    }
                }
                return redirect('admin/student');
            }
}
