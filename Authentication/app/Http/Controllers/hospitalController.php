<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class hospitalController extends Controller
{
    public function insert(Request $req){
    $data=$req->validate([
'hospitalname'=>'required',
'hospitaladdress'=>'required',
'pic'=>'required|image|mimes:jpg,jpeg,gif,png|max:2000',
'desc'=>'required',
    ]);

    $file=$req->file('pic')->store('hospitals',"public");
    $path=basename($file);
    
    $hospital=new hospital();
    $hospital->name=$data['hospitalname'];
    $hospital->location=$data['hospitaladdress'];
    $hospital->description=$data['desc'];
    $hospital->image=$path;
    $hospital->save();


      if($hospital){
        return redirect()->route('fatch_H');
      }
      else{
        return "error";
      }
    }


    public function fatch(){
$data=hospital::all();
return view('Admin.Hospital.allhospitals',['alldata'=>$data]);

    }



    public function delete($id){
      $delete=hospital::destroy($id);
return redirect()->route('fatch_H');
    }


    //edit
    public function edit($id){

$data=hospital::find($id);

      return view('Admin.Hospital.edit',compact('data'));
    }


//update
public function update(Request $req ,$id){
  $hospital=hospital::find($id);
   $hospital->name=$req['hospitalname'];
    $hospital->location=$req['hospitaladdress'];
    $hospital->description=$req['desc'];
    
 if($req->hasFile('pic')){

$oldpath=storage_path('app/public/hospitals/'.$hospital->image);
if(File::exists($oldpath)){
 File::delete($oldpath); 
}
  $file=$req->file('pic')->store('hospitals',"public");
    $path=basename($file);
   $hospital->image=$path;
   $hospital->save();
    return redirect()->route('fatch_H')->with('success',"Hospital Updated Successfully");
 }

  else{
      $hospital->save();
        return redirect()->route('fatch_H')->with('success',"Hospital Updated Successfully");
 }
  }


}


  
