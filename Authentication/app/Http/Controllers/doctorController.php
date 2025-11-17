<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\doctor;
use App\Models\hospital;
use Illuminate\Http\Request;

class doctorController extends Controller
{
public function add(){
$hospital=hospital::all();

    return view('Admin.Doctors.insert',compact('hospital'));
}


public function insert(Request $req){
$doctor=new doctor();
    $doctor->name=$req->name;
    $doctor->spc=$req->spc;
    $doctor->desc=$req->desc;
    $doctor->hospital_id=$req->hospital;
    $doctor->save();

    if($doctor){
        return redirect()->route('fatch.doctor')->with('success',"Doctor insert successfully...");
    }
    else{
         return redirect()->route('fatch.doctor')->with('error',"Doctor not inserted...");
    }
}



public function fatch(){
$doctor=doctor::with('hospital')->get();


    return view('Admin.Doctors.alldoctor',compact("doctor"));
}

}
