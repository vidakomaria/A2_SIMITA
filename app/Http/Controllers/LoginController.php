<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password'=> 'required'
        ]);

        if(Auth::attempt(['username'=>$credentials['username'], 'password'=>$credentials['password'], 'role'=>'karyawan'])){
            $request->session()->regenerate();
            return redirect()->intended('admin');
        }

        elseif (Auth::attempt(['username'=>$credentials['username'], 'password'=>$credentials['password'], 'role'=>'pemilik'])){
            $request->session()->regenerate();
            return redirect()->intended('pemilik');
        }

        return back()->with('loginError', 'Username/Password Salah');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->regenerate();

        request()->session()->regenerateToken();

        return redirect('/');
    }

}
