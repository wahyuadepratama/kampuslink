<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
  protected $table = "campus";

  protected $quarded = [];

  public function faculty(){
    return $this->hasMany('App\Models\Faculty');
  }

  public function organization(){
    return $this->hasMany('App\Models\Organization');
  }
}
