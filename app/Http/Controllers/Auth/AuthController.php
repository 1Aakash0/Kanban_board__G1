<?php

namespace App\Http\Controllers\Auth;

/*
Including Model,Hash and Auth for database structure, password encryption and Authnetication
*/

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /*
    Creating function for viewing login.blade.php page
    */
    public function login_index(){
        return view('Auth.login');
    }

    public function register_index(){
        return view('Auth.register');    
    }

    public function forgot_password_index(){
        return view('Auth.forgot-password');    
    }

    public function dashboard(){
        return view('dashboard');    
    }

    public function profile(){
        return view('profile');    
    }

    /*
    Login query for email and password validation
    */
    public function login(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email|max:255',
            'password'=>'required|min:6'
        ]);

        Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        /*
        Checking Response of the query if not null open dashboard else return to login
        */

        if(auth()->check() != null){
            return redirect()->route('dashboard');
        } else{
            return redirect()->route('login');
        }  
    }

    /*
    Creating function that allows user to register and after register redirect user to dashboard
    */

    public function register(Request $request){

        $this->validate($request,[
            'name'=>'required|max:255',
            'mobile'=>'required|min:10|max:10',
            'email'=>'required|email|max:255|unique:users,email',
            'password'=>'required|min:6',
            'confirm-password'=>'required|same:password'
        ]);

        User::create([
            'name'=>$request->name,
            'mobile'=>$request->mobile,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if(auth()->check() != null){
            return redirect()->route('dashboard');
        } else{
            return redirect()->route('register');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
}
