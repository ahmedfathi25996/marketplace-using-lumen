<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

use Illuminate\Http\Request;
use App\Category;
use App\Criteria;
use App\Rating;
use App\Subcategory;
use App\Option;
use App\OrderProduct;
class Product extends Model 
{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'name','description','price','qty',
    ];

  
   

    public function criterias()
    {
     return $this->belongsToMany('App\Criteria','products_criterias','product_id','criteria_id')->withTimestamps();
    }


    
   public function ratings()
   {
    return $this->hasMany('App\Rating');
   }

   public function subcategories()
    {
       return $this->belongsToMany('App\Subcategory','products_subcategories','product_id','subcategory_id')->withTimestamps();

    }
     public function options()
    {
        return $this->belongsToMany('App\Option','products_options','product_id','option_id')->withTimestamps();
    }

    public function category()
    {
         return $this->belongsTo('App\Category','category_id');
    }

    

   
     
}
