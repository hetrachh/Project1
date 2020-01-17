<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * [login description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email'=>'email','password'=>'password']);
        //return $credentials;
        if (Auth::guard('api')->attempt($credentials)) {
            $user = Auth::guard('api')->user();
            $tokenresult = $user->createToken('Personal Access Token');
            $token = $tokenresult->token;
            $token->save();
            $access = $tokenresult->accessToken;
            Auth::login($user);
            $user = Auth::user();
            return 'You are a company '.$access;
        } else if (Auth::guard('web')->attempt($credentials)) {
            return 'you are user';
        } else if (Auth::guard('admin')->attempt($credentials)) {
            return 'you are a admin';
        } else {
            return "check Credentials";
        }
    }

    public function user()
    {
        $user =Auth::user();
        return $user;
    }
}
