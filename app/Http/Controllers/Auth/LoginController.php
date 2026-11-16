<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;

class LoginController extends Controller
{
    public function login(Request $request){
        $validatedData = $request->validate([
               'username' => 'required',
               'password' => 'required'
           ],
           [
            'username.required'=> 'Mobile No/Email is Required', // custom message
            'password.required'=> 'Password is Required' // custom message
           ]
        );

        $username = $request->username;
        $password = $request->password;
        $validData = User::where('username',$username)->first();
        $password_check = password_verify($password, @$validData->password);
        if($password_check == false){
            return redirect()->back()->with('message','Mobile No/Email or Password does not match!');
        }
        if($validData->status == '0'){
            return redirect()->back()->with('message','Sorry! you are not active now.');
        }
        if($validData->status == '2'){
            return redirect()->back()->with('message','Sorry! your email is not verified yet');
        }
        if(Auth::attempt(['username'=>$username,'password'=>$password])){
            return redirect()->route('login');
        }
    }

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

    public function username(){
        return username;
    }
}
