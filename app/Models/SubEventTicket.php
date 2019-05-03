<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubEventTicket extends Model
{
  protected $table = "sub_event_ticket";
  public $timestamps = false;

  protected $guarded = [];

  public function subEvent(){
    return $this->belongsTo('App\Models\SubEvent','sub_event_id');
  }

}
