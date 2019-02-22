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
use App\Interfaces\RatingInterface;
use Cache;
class RatingController extends Controller
{
    public $rating;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RatingInterface $rating)
    {
        $this->rating=$rating;
    }


     public function addRating(Request $request,$id)
    {
      
          $this->validate($request, [
            
            'rating'    => 'required|integer|between:0,5',
            
        ]);
          $product=Product::find($id);
          
          if($product !=null){
    return $this->rating->addRating([
"user_id"=>Auth::user()->id,
"product_id"=>$product->id,
"rating"=>$request->input('rating')

]);
}
     return response('there is no product with this id');

            
             
    }
}
