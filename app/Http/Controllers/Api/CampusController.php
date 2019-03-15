<?php

namespace App\Http\Controllers\Api;

use App\Models\Campus;
use App\Models\Faculty;
use App\Models\ProgramStudy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CampusController extends Controller
{
  public function __construct()
  {
    $this->middleware('token.client');
  }

  public function indexCampus()
  {
    $campus = Campus::all();
    $campus->makeHidden(['created_at', 'updated_at']);
    return $campus;
  }

  public function showFaculty($token, $id)
  {
    $faculty = Faculty::where('campus_id', $id)->get();
    $faculty->makeHidden(['created_at', 'updated_at', 'campus_id']);
    return $faculty;
  }

  public function showProgramStudy($token, $id)
  {
    $study = ProgramStudy::where('faculty_id', $id)->get();
    $study->makeHidden(['created_at', 'updated_at', 'faculty_id']);
    return $study;
  }
}
