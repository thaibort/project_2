<?php

use App\Http\Controllers\admin\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\login;

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
    Route::get('login',['as' => 'login', 'home' => login::class, 'getLogin']);
    Route::post('login',['as' => 'login', 'home' => login::class, 'postLogin']);
});

Route::group(['prefix' => 'admin'], function () {
   Route::get('home',[adminController::class, 'home']);
   Route::get('vocation',[adminController::class, 'vocation']);
   Route::get('crevoca',[adminController::class, 'getCreateVocation']);
   Route::post('crevoca',[adminController::class, 'postCreateVocation']);
});
