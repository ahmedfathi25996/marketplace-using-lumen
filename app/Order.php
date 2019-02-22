<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\OrderProduct;

class Order extends Model 
{
    protected $casts = [
    'placeditems' => 'array',
];
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'user_id','total','sub_total',
    ];

   
 public function products()
    {
        return $this->belongsToMany('App\Product','orders_products','order_id','product_id')->withPivot('qty')->withTimestamps();
    }

    
    
 

   
     
}
