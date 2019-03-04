<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramStudy extends Model
{
  protected $table = "program_study";

  protected $quarded = [];

  public function faculty(){
    return $this->belongsTo('App\Models\Faculty','faculty_id');
  }

  public function user(){
    return $this->hasMany('App\Models\User');
  }
}
