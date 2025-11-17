<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\welcomemail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class authController extends Controller
{
    function register(Request $req){
        $data=$req->validate([
            'name'=>"required",
            'password'=>"required",
            'mail'=>"required|email|unique:users,mail",
        ]);

        $messsage="Hello Dear ! Welcome to New Site <br> User Name is : $req->name <br> User Mail is : $req->mail <br> User Password is : $req->password";
        $subject="Registration Details";
        Mail::to($req->mail)->send(new welcomemail($messsage,$subject));

        $user=User::create($data);

if($user){
    return redirect()->route('login')->with("success","User Account Created....");
}

else{
    return view('Auth.register');
}
     
    }



function login(Request $LReq){
      $logindata=$LReq->validate([
            'password'=>"required",
            'mail'=>"required|email",
        ]);

if(Auth::attempt($logindata)){
 return redirect()->route('dashboard');
}
else{
    return back()->with("error","Invalid User mail or Password");
}
   
}






function logout(){
    Auth::logout();
    return view("Auth.login");
}



}
