<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function dologin(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($credentials)){
            
            $request->session()->regenerate();

            if (auth()->user()->role_id == 1){
                return redirect()->intended('/administrator');
            }elseif (auth()->user()->role_id == 2)  {
                return redirect()->intended('/operator');
            }else {
                return redirect()->intended('/kepalagudang');
            }
        }
         return back()-with('eror','email atau password salah');
    }
    
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/');
    }
}
