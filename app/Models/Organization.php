<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
  protected $table = "organization";

  protected $fillable = [];

  public function event(){
    return $this->hasMany('App\Models\Event');
  }

  public function user(){
    return $this->belongsTo('App\Models\User','user_id');
  }
}
