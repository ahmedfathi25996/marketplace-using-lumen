<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\ProductResource;
use Illuminate\Contracts\Encryption\DecryptException;


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
             "total"=>$this->total,
             "created_at"=>$this->created_at,
             "products"=>ProductResource::collection($this->products)
             
             
             
            
        ];
    }
    
}
