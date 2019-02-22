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
use App\Interfaces\SubcategoryInterface;
use Cache;
class SubcategoryRepository implements SubcategoryInterface {


public $subcategory;

	public function __construct(Subcategory $subcategory){
       $this->subcategory=$subcategory;
        
       
	}
 

	
  
  public function addSubCategory(array $data)
  {
      
   return $this->subcategory->create($data);
    
  }

   
  }  




   
