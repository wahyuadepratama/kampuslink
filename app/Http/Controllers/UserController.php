<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Campus;
use App\Models\Ticket;
use App\Models\Faculty;
use App\Models\Organization;
use App\Models\Transaction;
use App\Models\ProgramStudy;
use Illuminate\Http\Request;
use App\Models\UserOrganization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image as Image;

class UserController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
    $this->middleware('user');
  }

  public function profile()
  {
    return view('user/profile');
  }

  public function getDataCampus()
  {
    return Campus::all();
  }

  public function getDataFaculty()
  {
    return Faculty::all();
  }

  public function getDataProgramStudy()
  {
    return ProgramStudy::all();
  }

  public function updateDataProfileUser(Request $request)
  {
    $this->validate($request,[
      'name' => 'required',
      'phone' => 'required|max:15',
      'avatar' => 'mimes:jpeg,jpg,png|max:52400'
    ]);

    if(file_exists(public_path('storage/avatar/'. Auth::user()->photo_profile))){
      unlink(public_path('storage/avatar/'. Auth::user()->photo_profile));
    }

    $thumbnail     = $request->file('avatar');
    $filename      = 'avatar_' . str_slug($request->name).'_'.time() . '.' . $thumbnail->getClientOriginalExtension();
    $small         = 'storage/avatar/' . $filename;
    $createSmall   = Image::make($thumbnail)->resize(150, 150)->save($small);

    $data = User::find(Auth::user()->id);
    $data->fullname    = $request->name;
    $data->phone       = $request->phone;
    $data->photo_profile = $filename;
    $data->date_birth  = $request->date_birth;
    $data->gender      = $request->gender;
    $data->save();

    return back()->with('success', 'Kamu Berhasil Memperbarui Profil');
  }

  public function updateDataKampusUser(Request $request)
  {
    $this->validate($request,[
      'campus' => 'required|not_in:'. '0',
      'faculty' => 'required|not_in:'. '0',
      'program_study' => 'required|not_in:'. '0'
    ]);

    $data = User::find(Auth::user()->id);
    $data->program_study_id = $request->program_study;
    $data->save();

    return back()->with('success', 'Kamu Berhasil Memperbarui Data Kampus');
  }

  public function updateDataLoginUser(Request $request)
  {
    $this->validate($request,[
      'password' => 'required|string|min:6|confirmed'
    ]);

     $data = User::find(Auth::user()->id);
     $data->password = bcrypt($request->password);
     $data->save();
     return back()->with('success', 'Kamu Berhasil Memperbarui Data Login');
  }

}
