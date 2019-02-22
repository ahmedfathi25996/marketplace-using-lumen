<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Order;
use App\Category;
use App\Subcategory;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\OrderResource;
use App\Coupon;
use Illuminate\Support\Facades\Mail;
use App\Interfaces\OrderInterface;
use Illuminate\Support\Facades\DB;
use App\Jobs\InvoiceJob;
use Carbon\Carbon;


class OrderController extends Controller
{
     private $order;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    public function __construct(OrderInterface $order)
    {
        $this->order=$order;
    }

    public function addOrder(Request $request)
    {
       $ord= $this->order->addOrder([
       "user_id"=>Auth::user()->id
         ]);
      $ord->products()->attach($request->products);   
         $sub_total=$ord->products()->sum(DB::raw('qty * price'));
         $coupon=$this->order->get_coupons();
         if($coupon)
           {
            $total=(($coupon->discount_amount)/100) * $sub_total ;

            }
            else{
              $total=$sub_total ;
            }
  $ord->where('id',$ord->id)->update(array('sub_total' => $sub_total,'total'=>$total));
  if($ord)
  {
    $products=$this->order->get_products();
    foreach ($products as $key) {
    foreach ($request->products as $in ) {
      if($key->stock >= $in['qty'])
      {
          $key->decrement('stock',$in['qty']);
      }
      else{
        return "there is no qty enough";
      }
  }
       }
 
   }
        $orders= $ord->where('id',$ord->id)->first();
      $data=array(
       "id"=>$orders->id,
       "sub_total"=>$orders->sub_total,
       "total"=>$orders->total,
       "products"=>$orders->products,
       "username"=>Auth::user()->username,
       "email"=>Auth::user()->email,
    
      );
            

       $job=(new InvoiceJob($data,Auth::user()->email))->delay(Carbon::now()->addSeconds(5));
          dispatch($job);
              return $orders;
  

    }

    public function getOrders()
    {
        return $this->order->getOrders();
    }
  


   


     public function showSoldProducts()
     {
        return $this->order->showSoldProducts();
     }


    
}
