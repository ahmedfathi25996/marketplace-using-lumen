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
use App\Interfaces\ProductInterface;
use Cache;
class ProductRepository implements ProductInterface {


public $product;

	public function __construct(Product $product,Request $request){
       $this->product=$product;
        
        $this->request=$request;
	}
 

	


  public function rating_sort()
  {
     $column =$this->request->input('orderBy');
     $type=$this->request->input('type');
         $input=$this->request->input('sub_category');
     return $this->product->whereHas('subcategories', function($query) use($input) {
         $query->where('name',$input);
         })->join('ratings','products.id','=','ratings.product_id')->orderBy($column,$type)->get();
 }

 public function price_sort()
 {
   $column =$this->request->input('orderBy');
    $type=$this->request->input('type');
    $input=$this->request->input('sub_category');
    return  $this->product->orderBy($column,$type)->whereHas('subcategories', function($query) use($input) {
          $query->where('name',$input);
         })->get();
 }
  

  

  public function filter()
  {

    $input=$this->request->input('sub_category');      
           $rating_value=$this->request->input('rating_value'); 
           $option=$this->request->input('criteria_option');
  return  $this->product->whereHas('subcategories', function($query) use($input) {
         $query->where('name',$input);
        })->whereHas('ratings',function($q) use($rating_value){
          $q->where('rating',$rating_value);
        })->whereHas('options',function($q) use($option){
           $q->where('name',$option);
        })->get();

             
  }

 
    

    
   


  public function addProduct()
  {
    $color=Option::where('criteria_id',1)->get();
             Cache::forever('color',$color);
    $category = Category::where('id',$this->request->input('category_id'))->firstOrFail();
    
    $this->product->name=$this->request->input('name');
    $this->product->description=$this->request->input('description');
    $this->product->price=$this->request->input('price');
    $this->product->stock=$this->request->input('stock');
    $this->product->category()->associate($category);
     $this->product->save();
    $this->product->subcategories()->attach($this->request->subcategories);
    $this->product->criterias()->attach($this->request->criterias);
   $this->product->options()->attach($this->request->options);


    
    }


        public function getProducts()
        {
           $products= Product::all();
            $pro=ProductResource::collection($products);
             return $pro;
               
          
        }
        

  }  




   