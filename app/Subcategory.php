<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
class Subcategory extends Model 
{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   //protected $hidden = ['pivot']; 
    protected $fillable = [
        'name','category_id',
    ];

    public function category()
    {
    	return $this->belongsTo('App\Category','category_id');
    }
public function products()
    {
        return $this->belongsToMany('App\Product','products_subcategories','subcategory_id','product_id')->withTimestamps();
    }
   

    
   

   

   
     
}
