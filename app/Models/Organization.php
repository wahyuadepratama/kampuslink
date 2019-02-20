<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
  protected $table = "organization";

  protected $guarded = [];

  public function event(){
    return $this->hasMany('App\Models\Event');
  }

  public function userOrganization(){
    return $this->hasMany('App\Models\UserOrganization');
  }

  public function campus(){
    return $this->belongsTo('App\Models\Campus','campus_id');
  }
}
