<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Viewer extends Model
{
    protected $table = "viewer";

    public $timestamps = false;

    protected $guarded = [];

    public function eventViewer(){
      return $this->hasMany('App\Models\EventViewer');
    }
}
