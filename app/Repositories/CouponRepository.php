<?php 

namespace App\Repositories;
use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Order;
use App\Rating;
use App\Subcategory;
use App\Category;
use App\Criteria;
use App\Option;
use App\Coupon;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\RatingResource;
use App\Http\Resources\ProductResource;
use App\Interfaces\CouponInterface;
use Cache;
class CouponRepository implements CouponInterface {


public $coupon;

	public function __construct(Coupon $coupon){
       $this->coupon=$coupon;
        
       
	}
 

	
  
  public function addPromoCode(array $data)
  {
      
   return $this->coupon->create($data);
    
  }

   
  }  




   
