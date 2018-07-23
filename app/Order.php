<?php

namespace App;
use App\User;
use App\Product;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\OrderResource;



class Order extends Model 
{
  
    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }
 

    public function products()
    {
        return $this->belongsToMany('App\Product','orders_products','order_id','product_id');
    }

    

     public function scopeAllOrdersProducts($query,$table,$value)
     {
         return $query->with($table)->where('user_id',$value)->get();
         

     }
}
