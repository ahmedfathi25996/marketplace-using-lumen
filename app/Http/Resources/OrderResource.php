<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\DB;
use App\Coupon;
class OrderResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        
        return [
           "order_id"=>$this->id,
             "user_id"=>$this->user_id,
             "total"=>$this->products()->sum(DB::raw('qty * price')),
             

             "products"=>ProductResource::collection($this->products)
            
        ];
    }
    
}
