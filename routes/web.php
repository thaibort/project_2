<?php

use App\Http\Controllers\admin\adminController;
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
    Route::get('home',[adminController::class, 'home'])->name('home');
    Route::get('logout',[adminController::class,'logout']);
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
   Route::get('crestaff',[adminController::class,'getCreateStaff']);
   Route::post('crevoca',[adminController::class, 'postCreateVocation']);

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
});
