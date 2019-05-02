<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campus extends Model
{
  protected $table = "campus";
  protected $quarded = [];

  use SoftDeletes;

  public function faculty(){
    return $this->hasMany('App\Models\Faculty');
  }

  public function organization(){
    return $this->hasMany('App\Models\Organization');
  }
}
