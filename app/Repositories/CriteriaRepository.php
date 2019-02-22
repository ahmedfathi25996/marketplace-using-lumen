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
use App\Interfaces\CriteriaInterface;
use Cache;
class CriteriaRepository implements CriteriaInterface {


public $criteria;

	public function __construct(Criteria $criteria){
       $this->criteria=$criteria;
        
       
	}
 

	
  
  public function addCriteria(array $data)
  {
      
   return $this->criteria->create($data);
    
  }

   
  }  




   