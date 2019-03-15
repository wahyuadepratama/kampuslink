<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Carbon\Carbon;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{

    public function __construct()
    {
      $this->middleware('token.client');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        $user = User::where('email', $request->email)->first();
        $user->last_login = Carbon::now()->setTimezone('Asia/Jakarta');
        $user->save();
        $user->makeHidden(['password','role_id','remember_token', 'program_study_id', 'created_at', 'updated_at', 'deleted_at']);

        $user->programStudy->faculty->campus;
        $user->programStudy->makeHidden(['created_at', 'updated_at', 'faculty_id']);
        $user->programStudy->faculty->makeHidden(['created_at', 'updated_at', 'campus_id']);
        $user->programStudy->faculty->campus->makeHidden(['created_at', 'updated_at', 'description', 'background_color', 'location', 'logo']);

        return response()->json(compact('user', 'token'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'name' => 'required|string|max:191',
          'nim' => 'required|unique:users',
          'program_study' => 'required|not_in:'.'0',
          'email' => 'required|string|email|max:191|unique:users',
          'password' => 'required|string|min:6|confirmed',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $username = preg_replace('/@.*?$/', '', $request->get('email'));
        $user = User::create([
            'fullname' => $request->get('fullname'),
            'nim' => $request->get('nim'),
            'program_study_id' => $request->get('program_study_id'),
            'username' => $username,
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'role_id' => 3,
            'last_login' => Carbon::now()->setTimezone('Asia/Jakarta')
        ]);

        $user->makeHidden(['password', 'role_id','remember_token']);
        $token = JWTAuth::fromUser($user);

        $user->programStudy->faculty->campus;
        $user->programStudy->makeHidden(['created_at', 'updated_at', 'faculty_id']);
        $user->programStudy->faculty->makeHidden(['created_at', 'updated_at', 'campus_id']);
        $user->programStudy->faculty->campus->makeHidden(['created_at', 'updated_at', 'description', 'background_color', 'location', 'logo']);

        return response()->json(compact('user','token'),201);
    }

    public function getAuthenticatedUser()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        return response()->json(compact('user'));
    }
}
