<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  protected $table = "event";

  protected $guarded = [];

  public function organization(){
    return $this->belongsTo('App\Models\Organization','organization_id');
  }

  public function eventCategory(){
    return $this->hasMany('App\Models\EventCategory');
  }

  // for attributes

  public function getDateAttribute()
  {
      return \Carbon\Carbon::parse($this->attributes['date'])
         ->format('d F Y');
  }

  public function getCreatedAtAttribute()
  {
      return \Carbon\Carbon::parse($this->attributes['created_at'])
         ->format('d, M Y H:i');
  }

  public function getUpdatedAtAttribute()
  {
    return \Carbon\Carbon::parse($this->attributes['updated_at'])->diffForHumans();
  }
}
