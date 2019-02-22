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
use App\Interfaces\CriteriaoptionInterface;
use Cache;
class CriteriaoptionRepository implements CriteriaoptionInterface {


public $option;

	public function __construct(Option $option){
       $this->option=$option;
        
       
	}
 

	
  
  public function addCriteriaOption(array $data)
  {
      
   return $this->option->create($data);
    
  }

   
  }  




   