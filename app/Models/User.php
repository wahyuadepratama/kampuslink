<?php
namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;
use App\Models\UserOrganization;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
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

    public function checkRoleUserOrganization($idOrganization)
    {
      $data = UserOrganization::where('organization_id', $idOrganization)->where('user_id', Auth::user()->id)->first();
      if($data->role == "Admin"){
        return "Admin";
      }else{
        return "Anggota";
      }
    }

    // for JWTAuth
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
}
