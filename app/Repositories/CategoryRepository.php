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
use App\Interfaces\CategoryInterface;
use Cache;
class CategoryRepository implements CategoryInterface {


public $category;

	public function __construct(Category $category){
       $this->category=$category;
        
       
	}
 

	
  
  public function addCategory(array $data)
  {
      
   return $this->category->create($data);
    
  }

   
  }  




   
