<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }
    public function store(Request $request){
        // validation
        $this->validate($request,[
           'name'=>'required |max:255',
           'username'=>'required |max:255',
           'email'=>'required | email |max:255',
           'password'=>'required | confirmed',

        ]);
        // validation ENd
        // store data
        User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "username"=>$request->username,
            "password"=>Hash::make($request->password),
        ]);
        // auth 
        auth()->attempt($request->only('email','password'));
        // rediract
        return redirect()->route('dashboard');
        
    }
}
