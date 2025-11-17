<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\doctorController;
use App\Http\Controllers\hospitalController;
use App\Http\Controllers\userController;
use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Auth


Route::get("register",function(){
    return view('Auth.register');
})->name('register');

Route::get("login",function(){
    return view('Auth.login');
})->name('login');

Route::get("dashboard",function(){
    return view('Admin.dashboard');
})->name('dashboard')->middleware(ValidUser::class);

Route::get("index",function(){
    return view('User.index');
})->name('index');

Route::get('/admin/user',[userController::class,"web"])->name('website');





//auth controller
Route::post('form/register',[authController::class,"register"])->name('auth.register');
Route::post('form/login',[authController::class,"login"])->name('auth.login');


//logout
Route::get('/logout',[authController::class,"logout"])->name('logout');





//Hospitals
Route::view('/admin/allHospitals',"Admin.Hospital.allhospitals")->name('fatchhospital');
Route::view('/admin/inserthospital',"Admin.Hospital.inserthospital");
Route::post('/inserthospital',[hospitalController::class,'insert']);

//fatch
Route::get('/fatchhospitals',[hospitalController::class,'fatch'])->name('fatch_H');
//delete
Route::get('/deletehospital{id}',[hospitalController::class,'delete'])->name('deletehospital');


// edit
Route::get('/edithospital{id}',[hospitalController::class,'edit'])->name('edithospital');

Route::view('/admin.edithospital',"Admin.Hospital.edit")->name('edithospital');

//update hopsital
Route::post('/update{id}',[hospitalController::class,'update'])->name('updatehospital');

Route::get('/doctor/insert',[doctorController::class,"add"])->name('add_doctor');
Route::post('/doctor/add',[doctorController::class,"insert"])->name('insert_doctor');
Route::get('/doctor/show',[doctorController::class,"fatch"])->name('fatch.doctor');

//getdoctors
Route::get('/get-doctor/{id}',[userController::class,"getdoctorbyhospital"]);

//submit 
Route::post('/submit',[userController::class,'insert'])->name('app.submit');

Route::get('/fatchapp',[userController::class,'fatch'])->name('fatch.app');