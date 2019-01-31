<?php
namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = [];

    public function role(){
      return $this->belongsTo('App\Models\Role','role_id');
    }

    public function organization(){
      return $this->hasMany('App\Models\Organization');
    }

    public function programStudy(){
      return $this->belongsTo('App\Models\ProgramStudy','program_study_id');
    }
}
