<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\User;
use Carbon\Carbon;
use Session;
use Brian2694\Toastr\Facades\Toastr;

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
        $this->middleware('guest')->except([
            'logout',
            'locked',
            'unlock'
        ]);
    }
    /** index page login */
    public function login()
    {
        return view('auth.login');
    }

    /** login with databases */
    public function authenticate(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'username' => 'required|string',
                'password' => 'required|string',
            ]);
            // $email = '@gmail.com';
            $username  = $request->username;
            $password = $request->password;

            if (Auth::attempt(['email'=>$username,'password'=>$password])) {
                
                /** get session */
                $user = Auth::User();
                Session::put('name', $user->name);
                Session::put('email', $user->email);
                Session::put('role_name',$user->role_name);
                Toastr::success('Login successfully :)','Success');
                return redirect()->intended('home');
            } else {
                Toastr::error('fail, WRONG USERNAME OR PASSWORD :)','Error');
                return redirect('login');
            }

        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('fail, LOGIN :)','Error');
            return redirect()->back();
        }
    }

    /** logout */
    public function logout()
    {
        Auth::logout();
        Toastr::success('Logout successfully :)','Success');
        return redirect('login');
    }
}