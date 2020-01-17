<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Company;
use UxWeb\SweetAlert\SweetAlert;
use validator;

class CustomLoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only(['email'=>'email','password'=>'password']);
        //return $credentials;
        if (Auth::guard('company')->attempt($credentials)) {
            return 'you are company';
        } else if (Auth::guard('web')->attempt($credentials)) {
            return 'you are user';
        } else if (Auth::guard('admin')->attempt($credentials)) {
            return 'you are a admin';
        } else {
            return "check Credentials";
        }
    }
    public function store()
    {
       SweetAlert::message('Robots are working!')->autoclose(3000);
       alert()->success('You have been logged out.', 'Good bye!')->autoclose(3000);
alert('Hello World!')->persistent("Close this");
       return redirect('/');
    }
}
