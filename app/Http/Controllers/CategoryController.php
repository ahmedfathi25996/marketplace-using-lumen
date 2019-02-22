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
use App\Interfaces\CategoryInterface;
use Cache;
class CategoryController extends Controller
{
    public $category;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoryInterface $category)
    {
        $this->category=$category;
    }


     public function addCategory(Request $request)
    {
      
          $this->validate($request, [
            
            'name'    => 'required',
            
        ]);
          
return $this->category->addCategory([

"name"=>$request->input('name')

]);


            
             
    }
}
