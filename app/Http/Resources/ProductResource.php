<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\ItemResource;
use Illuminate\Contracts\Encryption\DecryptException;


class ProductResource extends Resource
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

            
            "product_id"=>$this->id,
             "description"=>$this->description,
             "price"=>$this->price,
             "qty"=>$this->qty,
             
             
             
             
            
        ];
    }
    
}
