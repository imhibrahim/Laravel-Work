<?php

use App\Http\Controllers\registerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view("/register","register");
Route::post('register/data',[registerController::class,"register"]);
Route::view('/allstudent','allstudent');

//fatch
Route::get('/allstudent',[registerController::class,"fatchstd"]);

//delete
Route::get("/stddelete/{id}",[registerController::class,"stddelete"]);

//update
Route::get("Editstd/{id}",[registerController::class,"stdedit"]);
Route::post('/updateuser/{id}',[registerController::class,"updatestd"]);

//Search
Route::get('/search',[registerController::class,"search"]);
