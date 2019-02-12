<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
  protected $table = "transaction";

  protected $guarded = [];

  public function ticket(){
    return $this->hasMany('App\Models\Ticket');
  }

  public function user(){
    return $this->belongsTo('App\Models\User','user_id');
  }

  public function subEvent(){
    return $this->belongsTo('App\Models\SubEvent','sub_event_id');
  }
}
