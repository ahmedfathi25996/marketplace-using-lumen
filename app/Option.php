<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

use Illuminate\Http\Request;
use App\Criteria;
class Option extends Model 
{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $hidden = ['pivot'];
    protected $fillable = [
        'name','criteria_id'
    ];

  public function criteria()
  {
  	return $this->belongsTo('App\Criteria','criteria_id');
  }

    public function products()
    {
     return $this->belongsToMany('App\Product','products_options','option_id','product_id')->withTimestamps();
    }
   

   

   
     
}
