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


    //vocation
   Route::get('vocation',[adminController::class, 'vocation']);

        //delete
   Route::delete('vocation/{id}',[adminController::class, 'deleteVocation']);

        //update
   Route::get('upvoca/{id}',[adminController::class, 'goUpdateVocation']);
   Route::put('upvoca',[adminController::class, 'updateVocation']);

        //create
   Route::get('crevoca',[adminController::class, 'getCreateVocation']);
   Route::post('crevoca',[adminController::class, 'postCreateVocation']);

   //staff
   Route::get('crestaff',[adminController::class,'getCreateStaff']);
   Route::post('crevoca',[adminController::class, 'postCreateVocation']);

});
