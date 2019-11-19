<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\student;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            // 'studentID' => ['required', 'string', 'max:9', 'min:9', 'unique:users'],
            // 'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function createUser(array $data)
    {
        return User::create([
            'uid' => $this->generateUid(),
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'isAdmin' => false
        ]);
    }
    protected function createAdmin(array $data)
    {
        return User::create([
            'uid' => $this->generateUid(),
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'isAdmin' => true
        ]);
    }

    protected function addStudent($userID, $studentID){
        return student::create([
            'user_id' => $userID,
            'studentID' => $studentID
        ]);
    }
    public function userRegister(Request $request){
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->createUser($request->all())));
        $this->addStudent($user['uid'], $request->studentID);
        return response()->json(['data'=> $user->toArray()], 201) ?: redirect($this->redirectPath());
    }

    public function adminRegister(Request $request){
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->createAdmin($request->all())));
        return response()->json(['data'=> $user->toArray()], 201) ?: redirect($this->redirectPath());

    }
    public function generateUid(){
        return str_random(60);
    }

}
