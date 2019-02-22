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
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\RatingResource;
use App\Http\Resources\ProductResource;
use App\Interfaces\RatingInterface;
use Cache;
class RatingRepository implements RatingInterface {


public $rating;

	public function __construct(Rating $rating){
       $this->rating=$rating;
        
        
	}
 

	public function addRating(array $data)
  {

   return  $this->rating->create($data);
    
       
    
  }

  

  }  




   