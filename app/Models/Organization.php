<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
  protected $table = "organization";

  protected $fillable = ['id','campus_id', 'approved', 'creator', 'name', 'photo_profile', 'photo_cover', 'instagram', 'line', 'facebook', 'whatsapp', 'phone', 'description', 'created_at', 'updated_at'];

  public function event(){
    return $this->hasMany('App\Models\Event');
  }

  public function userOrganization(){
    return $this->hasMany('App\Models\UserOrganization');
  }

  public function campus(){
    return $this->belongsTo('App\Models\Campus','campus_id');
  }

  public function subEvent(){
    return $this->hasMany('App\Models\SubEvent');
  }
}
