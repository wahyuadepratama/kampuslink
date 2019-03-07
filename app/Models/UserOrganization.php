<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserOrganization extends Model
{
  protected $table = 'user_organization';

  protected $guarded = [];

  public $timestamps = false;

  public function user(){
    return $this->belongsTo('App\Models\User','user_id');
  }

  public function organization(){
    return $this->belongsTo('App\Models\Organization','organization_id');
  }
}
