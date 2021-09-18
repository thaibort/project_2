<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\adminModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
        $this->middleware('checkLevel');
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
                try {
                    adminModel::postCreateVocation($name,$money);
                }
                catch (QueryException $ex){
                    return redirect("admin/vocation")->with('error','Thêm thất bại');
                }
                return redirect("admin/vocation")->with('message','Thêm thành công');
            }

        //xóa
            public function deleteVocation(Request $request){
                $id = $request -> input('id');
                adminModel::deleteVocation($id);
                return redirect("admin/vocation")->with('message','Xóa thành công');
            }

        //sửa
            public function goUpdateVocation($id){
                $rs = adminModel::goUpdateVocation($id);
                return view('admin.component.super.vocation.update-vocation',['rs' => $rs]);
            }

            public function updateVocation(Request $request){
                $id =  $request -> input('id');
                $money = [
                    'totalMoney' =>  $request -> input('money')];
                $vocation = [
                    'name' =>  $request -> input('name')];
                adminModel::updateVocation($id,$money,$vocation);
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
                try {
                    adminModel::postCreateSchoolYear($name,$stagesPresent);
                }
                catch (QueryException $ex){
                    return redirect("admin/schyear")->with('error','Thêm thất bại');
                }
                return redirect("admin/schyear")->with('message','Thêm thành công');
            }

        //xóa
            public function deleteSchoolYear($id){
                adminModel::deleteSchoolYear($id);
                return redirect('admin/schyear')->with('message','Xóa thành công');
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
                try {
                    adminModel::postCreateClass($data);
                }
                catch (QueryException $ex){
                    return redirect("admin/class")->with('error','Thêm thất bại');
                }
                return redirect("admin/class")->with('message','Thêm thành công');
            }

        //xóa
            public function deleteClass($id){
                adminModel::deleteClass($id);
                return redirect('admin/class')->with('message','Xóa thành công');
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
                try {
                    adminModel::postCreateScholarship($data);
                }
                catch (QueryException $ex){
                    return redirect('admin/scholarship')->with('error','Thêm thất bại');
                }
                return redirect('admin/scholarship')->with('message','Thêm thành công');
            }

        //xóa
            public function deleteScholarship($id){
                adminModel::deleteScholarship($id);
                return redirect('admin/scholarship')->with('message','Xóa thành công');
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

                return redirect('admin/staff')->with('message','Thêm thành công');
            }

        //xóa
            public function deleteStaff($id){
                adminModel::deleteStaff($id);
                return redirect('admin/staff')->with('message','Xóa thành công');
            }
}
