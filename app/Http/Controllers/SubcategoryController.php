<?php

namespace App\Http\Controllers;
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
class SubcategoryController extends Controller
{
    public $subcategory;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SubcategoryInterface $subcategory)
    {
        $this->subcategory=$subcategory;
    }
public function addSubCategory(Request $request)
{
 $this->validate($request, [
            
            'name'    => 'required',
            
        ]);
$category = Category::where('id',$request->input('category_id'))->first();
      
return $this->subcategory->addSubCategory([
"name"=>$request->input('name'),
"category_id"=>$category->id
]);
}
}
