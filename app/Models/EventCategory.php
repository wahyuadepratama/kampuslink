<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
  protected $table = "event_category";
  public $timestamps = false;

  protected $quarded = [];

  public function category(){
    return $this->belongsTo('App\Models\Category','category_id');
  }

  public function event(){
    return $this->belongsTo('App\Models\Event','sub_event_id');
  }

}
