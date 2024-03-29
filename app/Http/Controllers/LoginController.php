<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
   
//     public function __construct()
//    {
//         $this->middleware('auth');
//    }
   public function index(){
    // return Auth::user();

   
        
        return view('login.index', [
            "title"=>'Login',
            "active"=>'login'
        ]);
    }

   


   public function authenticate(Request $request){

        $credentials= $request->validate([
            // 'email'=>'required|email:dns',
            'nik' =>'required',
            'password'=>'required'
        ]);


        if(Auth::attempt($credentials, true)){
            $request->session()->regenerate();
            return redirect('/alteration');// intented untuk direct url agar melewati middleware
        }

        return back()->with('loginError', 'Login Failed!'); 
    }

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

  
    
    
    
    

}

