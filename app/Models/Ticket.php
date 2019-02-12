<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
  protected $table = "ticket";

  protected $guarded = [];

  public function transaction(){
    return $this->belongsTo('App\Models\Transaction','transaction_id');
  }

}
