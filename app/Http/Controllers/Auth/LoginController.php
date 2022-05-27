<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(){
        return view('auth.login');
    }
    public function login(Request $request){
        // Validation
        $this->validate($request,[
            'email'=>'required | email |max:255',
            'password'=>'required',
        ]);
        if(auth()->attempt($request->only('email','password'))){
            return redirect()->route('dashboard');
        }else{
            return back()->with('status','Error input');
        }
        // Validation End
        
    }
}
