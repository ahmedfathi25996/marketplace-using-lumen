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
use App\Interfaces\ProductInterface;
use Cache;
class ProductController extends Controller
{
    private $product;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductInterface $product)
    {
        $this->product=$product;
    }

   

    public function sort(Request $request)
    {
         $this->validate($request, [
            'sub_category'    => 'required',
            'orderBy'    => 'required',
            'type'    => 'required',


            
        ]);
        $column =$request->input('orderBy');
        if($column == 'price'){
         $products= $this->product->price_sort();
        }
        elseif($column == 'rating'){
          $products=$this->product->rating_sort();
        }
               foreach ($products as $pro ) {
                  echo $pro;
              }
         
   }

     

   
   public function filter(Request $request)
   {
           $this->validate($request, [
            'sub_category'    => 'required',
            'rating_value'    => 'required',
            'criteria_option'    => 'required',


            
        ]);
           $products=$this->product->filter();
           foreach ($products as $pro ) {
                 echo $pro;
             }
   }

   
  



   
   public function addProduct(Request $request)
   {
     $this->validate($request, [
            'name'    => 'required',
            'description' =>'required',
            'price' => 'required|integer',
            'stock'=>'required|integer',
            'category_id'=>'required',
           
            

            
        ]);
     $this->product->addProduct();
     return response('product addedd successfuly');
   }

   public function getProducts()
   {

        //return $this->product->getProducts();
        $products = Product::with('subcategories','criterias','options')->get();
        return $products;

        // $products = Product::all();
        // $options =array();
        // $criterias =array();
        // foreach($products as $product)
        // {
        //     $criterias[] = $product->criterias;
        //     $options[] = $product->options;

        // }
        // return [$product,$criterias,$options];
   }

  

   
}
