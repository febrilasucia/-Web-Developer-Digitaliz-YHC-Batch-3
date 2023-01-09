<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('/login');
    }

    public function login(Request $request){
        
        Session::flash('email', $request->email);
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ], [
            'email.required'=>'Email wajib diisi',
            'password.required'=>'Password wajib diisi',
        ]);

        $infologin = [
        'email'=>$request->email,
        'password'=>$request->password
        ]; 

        if(Auth::attempt($infologin)){
            //klo oten sukses
            // return 'sukses';
            return redirect('/home')->with('succsess','Berhasil login');
        }else{
            //kalo gagal
            // return 'gagal';
            return redirect('login')->withErrors('Username dan Password yang dimasukkan tidak valid');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/login');
    }
}
