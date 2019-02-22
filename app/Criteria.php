<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

use Illuminate\Http\Request;
use App\Option;
use App\Product;
class Criteria extends Model 
{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $hidden = ['pivot'];
    protected $fillable = [
        'name','product_id'
    ];

  
public function options()
   {
      return $this->hasMany('App\Option');
   }
    


    public function products()
    {
     return $this->belongsToMany('App\Product','products_criterias','criteria_id','product_id')->withTimestamps();
    }
  
   

   

   
     
}
