<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        
        $email = $request->input("email");
        $password = $request->input("password");

        $credentials = $request->only('email','password','tipo');

        if($email == "kevinlarios2343@gmail.com" && $password == "123"){
            return "admin";
        }
        elseif(Auth::attempt($credentials)){
            return "cliente";
        }
        return back()->withErrors(['password' => "El Usuario no existe o la Informacion es Incorrecta"]);
        
    
    }

}
