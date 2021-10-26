<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
 public function index(){
    return view('auth.login');
 }
 public function signin(Request $request){
    $this->validate($request, [
        'email' => 'required|email',
        'password'=> 'required',
    ]);
    if(!auth()->attempt($request->only('email', 'password'), $request->remember)){
        return redirect()->back()->with('status', 'invalid login details');
    };
    return redirect('dashboard');
 }
 public function signout(Request $request){
     auth()->logout();

     return redirect("/");
 }
}
