<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
  protected $table = "faculty";

  protected $quarded = [];

  public function campus(){
    return $this->belongsTo('App\Models\Campus','campus_id');
  }

  public function programStudy(){
    return $this->hasMany('App\Models\ProgramStudy');
  }
}
