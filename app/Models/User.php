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

    protected $fillable = [
        'name', 'username' ,'email','role_id','password','avatar'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function role(){
      return $this->belongsTo('App\Models\Role','role_id');
    }

    public function organization(){
      return $this->hasMany('App\Models\Organization');
    }
}
