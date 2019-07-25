<?php

namespace App\Http\Controllers\Auth;

use Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request as Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //Customize login disini.......
    
    protected function redirectTo()
    {
        if(isset($_POST['redirect'])){
            return '/register-organization';
        }else{
            return '/';
        }
    }
    
    public function username()
    {
       $login = request()->input('identity');
       $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
       request()->merge([$field => $login]);
       return $field;
    }

    public function showLoginForm()
    {
        return view('guest.login');
    }

    public function authenticated(Requests $request, $user) {
        $user->last_login = Carbon::now()->setTimezone('Asia/Jakarta');
        $user->save();
    }
}
