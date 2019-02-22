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
use App\Interfaces\CriteriaInterface;
use Cache;
class CriteriaController extends Controller
{
    public $criteria;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CriteriaInterface $criteria)
    {
        $this->criteria=$criteria;
    }
public function addCriteria(Request $request)
{
 $this->validate($request, [
            
            'name'    => 'required',
            
        ]);
          
return $this->criteria->addCriteria([
"name"=>$request->input('name'),
]);
}
}
