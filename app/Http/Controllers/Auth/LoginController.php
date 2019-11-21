<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }
    public function login(Request $request){
        // dd($request->all());
        $this->validateLogin($request);
        if($this->attemptLogin($request)){
            $user = $this->guard()->user();
            $user->generateToken();
            // dd($user);
            // dd(Auth::guard('')->user());
            return response()->json(['data'=> $user->toArray()]);
        }
        return $this->sendFailedLoginResponse($request);
    }

    public function loginWithToken($token){
        if($token){
            $user = User::where('token', $token)->first();
            // dd($user);
            return response()->json(['data'=>$user->toArray()]);
        }
        return response()->json(['data'=>'No token']);
    }

    public function logout(Request $request){
        // dd($request->all());
        // $user = Auth::user();
        // $user = Auth::guard('api')->user();
        
        // dd($request->all());
        $user = User::where('token', $request->token)->first();

        // dd(Auth::guard('')->user());
        if($user){
            $user->token = null;
            $user->save();
            return response()->json(['data'=> "user has logged out."], 200);

        }else{
            return response()->json(['data'=> "user has has not logged in."], 200);
        }
    }
}
