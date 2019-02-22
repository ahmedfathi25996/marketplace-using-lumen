<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Contracts\Encryption\DecryptException;

class RatingResource extends Resource
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
           "rating_id"=>$this->id,
             "user_id"=>$this->user_id,
             "product_id"=>$this->product_id,
             "rating"=>$this->rating,
             
            
        ];
    }
    
}
