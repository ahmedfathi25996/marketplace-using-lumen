<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

use Illuminate\Http\Request;
use App\User;
use App\Product;
class Coupon extends Model 
{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'code','discount_amount'
    ];

  public function coupon()
  {
    return $this->discount_amount;
  }
    
   

   

   
     
}
