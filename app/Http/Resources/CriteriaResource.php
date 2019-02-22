<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Http\Resources\OptionResource;
use App\Http\Resources\ProductResource;

use Illuminate\Support\Facades\DB;
use App\Product;
use App\Criteria;
class CriteriaResource extends Resource 
{
    

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return[
            "name"=>$this->name,
            "options"=>$this->options
      ];
    



    
    }
     
    
}
