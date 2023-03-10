<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class EnduserLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:enduser');
        
    }
    public function showLoginForm(){
        return view('auth.enduser-login');
    }
    public function login(Request $request){
        //return true;
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        //actor_type 1: enduser, 2 = enduser, 3=only  viewer
        if(Auth::guard('enduser')->attempt(['actor_type'=>2,'email'=>$request->email,'password'=>$request->password], $request->remember)){
            //echo 'yes.. gurest is woprkksdfdfkl';
            return redirect()->intended(route('enduser.dashboard'));
        }
        
        return redirect()->back()->withInput($request->only('email','remember'));
    }
}
