<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubEvent extends Model
{
  protected $table = "sub_event";

  protected $quarded = [];

  public function category(){
    return $this->belongsTo('App\Models\Category','category_id');
  }

  public function event(){
    return $this->belongsTo('App\Models\Event','event_id');
  }

  public function eventCategory(){
    return $this->hasMany('App\Models\EventCategory');
  }

  public function eventViewer(){
    return $this->hasMany('App\Models\EventViewer');
  }

  public function getUpdatedAtAttribute()
  {
    return \Carbon\Carbon::parse($this->attributes['updated_at'])->diffForHumans();
  }

  // public function getDateAttribute()
  // {
  //     return \Carbon\Carbon::parse($this->attributes['date'])
  // }
  //        ->format('l, d F Y');
}
