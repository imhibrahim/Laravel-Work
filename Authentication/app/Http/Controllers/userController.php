<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\appoiment;
use App\Models\doctor;
use App\Models\hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function web(){
       // return redirect()->route('index',compact('hospital'));
       $hospital=hospital::all();
       $doctor=doctor::all();
    return view('User.index',compact('hospital','doctor'));
    }


public function getdoctorbyhospital($id){
$doctor=doctor::where('hospital_id',$id)->get();

return response()->json($doctor);
}

public function insert(Request $req){
$opp=new appoiment();
$opp->p_name=$req->name;
$opp->p_mail=$req->mail;
$opp->p_address=$req->address;
$opp->p_age=$req->age;
$opp->date=$req->date;
$opp->h_id=$req->hospital;
$opp->d_id=$req->doctor;
$opp->userid= Auth::user()->id;
    $opp->save();

if($opp){
return redirect()->route('fatch.app');
}
else{
    return 'data not inserted';
}

}


function fatch(){

$uid=Auth::user()->id;
$fatch=appoiment::with(['hospital','doctor','user'])->where('userid',$uid)->get();
    return view('User.fatchapp',compact('fatch'));
}

}
