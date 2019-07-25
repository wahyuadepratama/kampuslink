<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:191',
            'nim' => 'required|unique:users',
            'program_study' => 'required|not_in:'.'0',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        $username = preg_replace('/@.*?$/', '', $data['email']);
        return User::create([
            'fullname' => $data['name'],
            'nim' => $data['nim'],
            'program_study_id' => $data['program_study'],
            'username' => $username,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => 3,
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ]);
    }

    public function showRegistrationForm() {
        return view('guest.register');
    }

}
