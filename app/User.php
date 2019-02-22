<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Scope;
use OwenIt\Auditing\Contracts\Auditable;
use App\Rating;
class User extends Model implements JWTSubject, AuthenticatableContract, AuthorizableContract, Auditable
{
    use Authenticatable, Authorizable;
        use \OwenIt\Auditing\Auditable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'username','email','password','api_token','activated'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    
    public function scopeActive($query,$api_token)
    {
       
       return $query->where('api_token',$api_token)->first();
        
    }

public function ratings()
{
    return $this->hasMany('App\Rating');
}   

   
     
}
