<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\aboutscontroller;


Route::get('edit-profile/{nickname?}',[\App\Http\Controllers\ProfileController::class,'update']);
Route::post('profile-update-result',[\App\Http\Controllers\ProfileController::class,'updateResult'])->name('profile-update-result');
//allupdatewebdisplay



Route::get('edit-all-profile-infos/{username?}',[\App\Http\Controllers\ProfileallController::class,'allupdate']);
Route::post('all-profile-update-results',[\App\Http\Controllers\ProfileallController::class,'allupdateResult'])->name('all-profile-update-results');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[\App\Http\Controllers\IndexController::class,'index'])->name('index');
Route::get('/index',[\App\Http\Controllers\IndexController::class,'index']);
Route::get('/index',function (){return view('index');});
Route::get('/index2',function (){return view('index2');});

Route::get('iletisim',function (){return view('iletisim');})->name('iletisim');//iletişimi görüntüledim sadece
Route::get('admin',function (){return view('admin');})->name('admin');
Route::get('check',function (){return view('check');})->name('check');
Route::get('edit',function (){return view('edit');})->name('edit');
Route::get('iletisimsonuc',function (){return view('iletisimsonuc');})->name('iletisimsonuc');
Route::get('aboutupdate',function (){return view('aboutupdate');})->name('aboutupdate');


Route::get('login',[\App\Http\Controllers\AuthController::class,'login'])->name('login');
Route::get('register',[\App\Http\Controllers\AuthController::class,'register'])->name('register');

Route::get('iletisimsonuc',[\App\Http\Controllers\aboutscontroller::class,'index'])->name('iletisimsonuc');//verileri çeken kısım iletisim sonuc bölümünde


Route::post('login-result',[\App\Http\Controllers\AuthController::class,'loginResult'])->name('login_result');
Route::post('regsiter-result',[\App\Http\Controllers\AuthController::class,'registerResult'])->name('register_result');
Route::get('logout',[\App\Http\Controllers\AuthController::class,'logout'])->name('logout');
Route::post('sednmessage',[\App\Http\Controllers\AuthController::class,'sendmessage'])->name('send_message');

Route::post('Admin-Login',[\App\Http\Controllers\AuthController::class,'AdminLogin'])->name('admin_login');


Route::view('add','addmember');
Route::post('add',[MemberController::class,'addData']);



Route::group(['prefix'=>'iletisim'],function (){
    Route::get('/',[aboutscontroller::class,'index'])->name('iletisim.index');
    Route::get('/detail/{id?}',[aboutscontroller::class,'detail'])->name('iletisim.detail');
    Route::get('/store',[aboutscontroller::class,'store'])->name('iletisim.store');
    Route::get('/update',[aboutscontroller::class,'update'])->name('iletisim.update');
    Route::get('/delete',[aboutscontroller::class,'delete'])->name('iletisim.delete');
});


