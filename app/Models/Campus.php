<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campus extends Model
{
  protected $table = "campus";
  protected $quarded = [];
  protected $fillable = ['id', 'name', 'logo', 'location', 'description', 'background_color'];

  use SoftDeletes;

  public function faculty(){
    return $this->hasMany('App\Models\Faculty');
  }

  public function organization(){
    return $this->hasMany('App\Models\Organization');
  }
}
