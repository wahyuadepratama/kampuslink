<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventViewer extends Model
{
    protected $table = "event_viewer";

    public $timestamps = false;

    protected $guarded = [];

    public function subEvent(){
      return $this->belongsTo('App\Models\SubEvent','sub_event_id');
    }

    public function viewer(){
      return $this->belongsTo('App\Models\Viewer','viewer_id');
    }
}
