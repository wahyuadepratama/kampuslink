<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
  protected $table = "organization";

  protected $fillable = [
    'name', 'photo_profile', 'photo_cover', 'instagram', 'line', 'facebook', 'whatsapp', 'phone', 'description', 'user_id', 'created_at', 'updated_at'
  ];

  public function event(){
    return $this->hasMany('App\Models\Event');
  }

  public function user(){
    return $this->belongsTo('App\Models\User','user_id');
  }
}
