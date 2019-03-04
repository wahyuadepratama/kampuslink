<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Campus;
use App\Models\Ticket;
use App\Models\Faculty;
use App\Models\Transaction;
use App\Models\ProgramStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
    ]);

     $data = User::find(Auth::user()->id);
     $data->fullname    = $request->name;
     $data->phone       = $request->phone;
     $data->date_birth  = $request->date_birth;
     $data->gender      = $request->gender;
     $data->save();
     return back()->with('success', 'Kamu Berhasil Memperbarui Profil');
  }

  public function updateDataKampusUser(Request $request)
  {
    $this->validate($request,[
      'campus' => 'required',
      'faculty' => 'required',
      'program_study' => 'required'
    ]);

     $data = User::find(Auth::user()->id);

     if($campus = Campus::where('name', $request->campus)->first()){
       if($faculty = Faculty::where('name', $request->faculty)->first()){
         if($program_study = ProgramStudy::where('name', $request->program_study)->first()){

           $data->programStudy->faculty->campus_id = $campus->id;
           $data->programStudy->faculty->save();

           $data->programStudy->faculty_id = $faculty->id;
           $data->programStudy->save();

           $data->program_study_id = $program_study->id;
           $data->save();

         }else{
           return back()->with('error', 'Program Studi Tidak Ditemukan!');
         }
       }else{
         return back()->with('error', 'Fakultas Tidak Ditemukan!');
       }
     }else{
       return back()->with('error', 'Kampus Tidak Ditemukan!');
     }

     return back()->with('success', 'Kamu Berhasil Memperbarui Data Kampus');
  }

  public function updateDataLoginUser(Request $request)
  {
    $this->validate($request,[
      'password' => 'required|string|min:6|confirmed'
    ]);

     $data = User::find(Auth::user()->id);
     $data->password    = $request->password;
     $data->save();
     return back()->with('success', 'Kamu Berhasil Memperbarui Data Login');
  }

  public function showRegisterOrganization()
  {
    return view('user/register_organization');
  }

}
