<?php
namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = [];

    public function role(){
      return $this->belongsTo('App\Models\Role','role_id');
    }

    public function userOrganization(){
      return $this->hasMany('App\Models\UserOrganization');
    }

    public function programStudy(){
      return $this->belongsTo('App\Models\ProgramStudy','program_study_id');
    }

    public function transaction(){
      return $this->hasMany('App\Models\Transaction');
    }

    public function isOnline($id)
    {
      return Cache::has('user-is-online-' . $id);
    }
}
