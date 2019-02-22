<?php 

namespace App\Repositories;
use App\Interfaces\OrderInterface;
use App\User;
use Illuminate\Http\Request;
use App\Order;
use App\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\OrderResource;
use Illuminate\Support\Facades\Mail;
use App\Events\InvoiceEvent;
use App\Jobs\InvoiceJob;
use Illuminate\Support\Facades\DB;
use App\Coupon;
use Carbon\Carbon;
use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;

class OrderRepository implements OrderInterface {


public $order;

	public function __construct(Order $order,Request $request){
       $this->order=$order;
        
        $this->request=$request;
        
	}

	
	
	 public function addOrder(array $data)
	 {
         
     return $this->order->create($data);

}

 public function get_coupons()
 {
  return Coupon::where('code', '=', $this->request->input('code'))->first();

 }


 public function get_products()
 {
     return Product::whereIn('id',$this->request->products)->get();
 }
 
public function getOrders()
{
  return $this->order->with('products')->get();
        
}



  public function showSoldProducts()
  {
     $from = $this->request->input('from');
     $to = $this->request->input('to');
     
     $orders = $this->order->all();
     if($from)
         $orders = $orders->where('created_at','>=',$from);
     if($to)
         $orders = $orders->where('created_at','<=',$to);
     
     Excel::create('orders', function($excel) {

            $excel->sheet('Sheet1', function($sheet) {
                
                $or=$this->order->all();
                $arr =array();
                foreach($or as $order) {
                    foreach($order->products as $pro){
                        $data =  array($order->id, $pro->name,$pro->description,$pro->price, $order->sub_total, $order->total);
                        array_push($arr, $data);
                    }
                }

                //set the titles
                $sheet->fromArray($arr,null,'A1',false,false)->prependRow(array(
                        'Order Id','Product Name', 'Description','Price','Sub Total','Total After Discount'
                    )

                );

            });

        })->export('xls');


  }


    
 
  
      }
    



    


