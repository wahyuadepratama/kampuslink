<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  protected $table = "event";

  protected $fillable = [
    'name', 'description', 'qr_code', 'status', 'start_time', 'end_time', 'date', 'photo', 'web_link', 'organization_id', 'created_at', 'updated_at'
  ];

  public function organization(){
    return $this->belongsTo('App\Models\Organization','organization_id');
  }

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
