<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Http\Resources\CriteriaOptionResource;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ProductResource;

class OptionResource extends Resource
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
         "value"=>$this->name,
        ];
    }
    
}
