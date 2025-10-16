<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class registerController extends Controller
{
    function register(Request $req){
       $data= $req->validate([
'name'=>"required",
'email'=>"required|email",
'number'=>"required",
'pass'=>"required|min:6",
        ]);

        // $result=DB::insert("INSERT INTO `students`(`name`, `mail`, `password`, `gander`, `number`)
        //  VALUES(
        // '{$req->name}',
        // '{$req->email}',
        // '{$req->pass}',
        // '{$req->gander}',
        // '{$req->number}'
        // )");

        // $result=Db::insert("INSERT INTO `students`(`name`, `mail`, `password`, `gander`, `number`)
        //  VALUES(?,?,?,?,?)",[
        //     $req->name,
        //     $req->email,
        //     $req->pass,
        //     $req->gander,
        //     $req->number
        //  ]);

//         $result=Db::table('students')->insert([
// 'name'=>$req->name,
// 'mail'=>$req->email,
// 'password'=>$req->pass,
// 'gander'=>$req->gander,
// 'number'=>$req->number
//         ]);

$student=new student();
$student->name=$req->name;
$student->mail=$req->email;
$student->password=$req->pass;
$student->gander=$req->gander;
$student->number=$req->number;
$student->save();

if($student){
  return redirect('/allstudent')->with('success',"The Data Created Successfully.....");
}
else{
    return "not created....";
}
        
    }

//Fatch data
function fatchstd(){
    //row query
  //$data=Db::select('select * from students');
  //$data=Db::table('students')->get();
  $data=student::all();

  return view('allstudent',['data1'=>$data]);
}


//delete
function stddelete($id){

   // $result=Db::delete("delete from students where id = $id");
   //$result=Db::table('students')->delete($id);

   $result=student::destroy($id);
    if($result){
        return redirect('allstudent');
    }
    
}

//update
function stdedit($id){
 //$userdata=Db::select("select * from students where id = $id");
 $userdata=student::find($id);

return view('stdupdate',["stdData"=>$userdata]);
}

//editstd
function updatestd(Request $Ereq ,$id){
    $update=student::find($id);
    $update->name=$Ereq->name;
    $update->mail=$Ereq->email;
    $update->password=$Ereq->pass;
    $update->gander=$Ereq->gander;
    $update->number=$Ereq->number;
    if($update->save()){
        return redirect('allstudent');
    }
    else{

return "Data is not updated";
}
}


//
function search(Request $Sreq){
    $data=student::where('name','like',"%$Sreq->search%")->get();
 
    return view('allstudent',['data1'=>$data]);
}


}
