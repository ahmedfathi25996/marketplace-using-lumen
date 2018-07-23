<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\ProductResource;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Http\Resources\OrderResource;

class UserResource extends Resource
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

            
            "username"=> $this->username,
             "email"=>$this->email,
             "activated"=>$this->activated,
             "role"=>$this->role,
             
             
             "orders"=> url('ordersProducts',$this->id)
             
            
        ];
    }
    
}
