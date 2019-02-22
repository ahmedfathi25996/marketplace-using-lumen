<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Order;
use App\Rating;
use App\Subcategory;
use App\Option;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\RatingResource;
use App\Http\Resources\ProductResource;
use App\Interfaces\CouponInterface;
use Cache;
class CouponController extends Controller
{
    public $coupon;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CouponInterface $coupon)
    {
        $this->coupon=$coupon;
    }


     public function addPromoCode(Request $request)
    {
      
          $this->validate($request, [
            
            'code'    => 'required',
            'discount_amount' => 'required'
            
        ]);
          
return $this->coupon->addPromoCode([

"code"=>$request->input('code'),
"discount_amount"=>$request->input('discount_amount')

]);


            
             
    }
}
