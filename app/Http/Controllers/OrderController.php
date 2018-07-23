<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Order;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
   

    public function OrdersProducts($id)
    {
        $orders=Order::allOrdersProducts('products',$id);
        if($orders)
        {
          return OrderResource::collection($orders);
        }
        else{
            return response()->json(['error'=>'can not fetch data'],404);
        }
    }

    

    
}
