<?php

use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\admin\staffController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\loginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'admin'], function () {
    Route::get('',[loginController::class, 'getLogin'])->name('login');
    Route::post('',[loginController::class, 'postLogin']);
    Route::get('home',[staffController::class, 'home'])->name('home');
    Route::get('logout',[loginController::class,'logout']);
});

Route::group(['prefix' => 'admin'], function () {


   //ngành và tổng tiền
       Route::get('vocation',[adminController::class, 'vocation']);

        //xóa
            Route::delete('vocation/{id}',[adminController::class, 'deleteVocation']);

        //sửa
           Route::get('upvoca/{id}',[adminController::class, 'goUpdateVocation']);
           Route::put('upvoca',[adminController::class, 'updateVocation']);

        //thêm
           Route::get('crevoca',[adminController::class, 'getCreateVocation']);
           Route::post('crevoca',[adminController::class, 'postCreateVocation']);

   //nhân viên
       Route::get('staff',[adminController::class,'staff']);

       Route::get('staffinfor',[staffController::class,'staffInformation']);

        //kích hoạt tài khoản
            Route::get('staffactive/{id}/{active}',[adminController::class,'active']);

        //thêm
            Route::get('crestaff',[adminController::class,'getCreateStaff']);
            Route::post('crestaff',[adminController::class, 'postCreateStaff']);

        //xóa
            Route::delete('staff/{id}',[adminController::class, 'deleteStaff']);

        //sửa
            Route::get('upstaff',[staffController::class,'goUpdateStaff']);
            Route::put('poststaff',[staffController::class, 'updateStaff']);

   //năm học
       Route::get('schyear',[adminController::class,'schoolYear']);
        //thêm
            Route::get('creschyear',[adminController::class,'getCreateSchoolYear']);
            Route::post('creschyear',[adminController::class,'postCreateSchoolYear']);

        //xóa
            Route::delete('schyear/{id}',[adminController::class, 'deleteSchoolYear']);

        //sửa
            Route::get('upschyear/{id}',[adminController::class, 'goUpdateSchoolYear']);
            Route::put('upschyear',[adminController::class, 'updateSchoolYear']);


    //lớp
       Route::get('class',[adminController::class, 'class']);

        //thêm
            Route::get('creclass',[adminController::class,'getCreateClass']);
            Route::post('creclass',[adminController::class,'postCreateClass']);

        //xóa
            Route::delete('class/{id}',[adminController::class, 'deleteClass']);

        //sửa
            Route::get('upclass/{id}',[adminController::class, 'goUpdateClass']);
            Route::put('upclass',[adminController::class, 'updateClass']);

    //học bổng
       Route::get('scholarship',[adminController::class, 'scholarship']);

        //thêm
            Route::get('crescholarship',[adminController::class,'getCreateScholarship']);
            Route::post('crescholarship',[adminController::class,'postCreateScholarship']);

        //xóa
            Route::delete('scholarship/{id}',[adminController::class, 'deleteScholarship']);

        //sửa
            Route::get('upscholarship/{id}',[adminController::class, 'goUpdateScholarship']);
            Route::put('upscholarship',[adminController::class, 'updateScholarship']);

    //sinh viên
       Route::get('student',[staffController::class, 'student']);

       Route::get('stuinfor/{id}',[staffController::class,'stuinfor']);

        //thêm
            Route::get('crestudent',[staffController::class,'getCreateStudent']);
            Route::post('crestudent',[staffController::class,'postCreateStudent']);

        //xóa
            Route::delete('student/{id}',[staffController::class, 'deleteStudent']);

        //sửa
            Route::get('upstudent/{id}',[staffController::class, 'goUpdateStudent']);
            Route::put('upstudent',[staffController::class, 'updateStudent']);

    //hóa đơn
       Route::get('invoice',[staffController::class,'invoice']);

        //tổng hóa đơn
            Route::get('toindetail/{id}',[staffController::class,'totalInvoiceDetail']);

        //hóa đơn chi tiết
            Route::get('detailinvoice/{id}',[staffController::class,'detailInvoice']);

        //thêm
            Route::get('checkinfor/{id}',[staffController::class,'checkInformation']);
            Route::post('gocreinvoice',[staffController::class,'getCreateInvoice']);
            Route::post('creinvoice',[staffController::class,'postCreateInvoice']);

        //xóa
            Route::delete('invoice',[staffController::class, 'deleteInvoice']);

    //form tăng đợt
       Route::get('stageform',[staffController::class,'stageForm']);
       Route::post('stageform',[staffController::class,'PostStageForm']);
});
