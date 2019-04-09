<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function login(){
    return view('auth.login');
  }
  public function autenticar(Request $request){
    $credenciales = $request->only('username', 'password');
    if (Auth::attempt($credenciales)){
      return redirect('/');
    }else{
      return redirect('/login')->withErrors('Credenciales incorrectas');
    }
  }

  public function logout(){
    Auth::logout();
    return redirect('/login');
  }
}
