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
use App\Interfaces\CriteriaoptionInterface;
use Cache;
class CriteriaoptionController extends Controller
{
    public $option;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CriteriaoptionInterface $option)
    {
        $this->option=$option;
    }
public function addCriteriaOption(Request $request)
{
 $this->validate($request, [
            
            'name'    => 'required',
            
        ]);
$criteria = Criteria::where('id',$request->input('criteria_id'))->first();
      
return $this->option->addCriteriaOption([
"name"=>$request->input('name'),
"criteria_id"=>$criteria->id
]);
}
}
