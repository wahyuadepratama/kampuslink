<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
  protected $table = "event_category";
  public $timestamps = false;

  protected $fillable = ['id', 'category_id', 'sub_event_id'];

  public function category(){
    return $this->belongsTo('App\Models\Category','category_id');
  }

  public function subEvent(){
    return $this->belongsTo('App\Models\SubEvent','sub_event_id');
  }

}
