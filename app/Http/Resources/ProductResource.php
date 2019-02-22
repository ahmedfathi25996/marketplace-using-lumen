<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Http\Resources\SubcategoryResource;
use App\Http\Resources\CriteriaResource;
use App\Http\Resources\OptionResource;
use App\Product;
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
             "name"=>$this->name,
             "description"=>$this->description,
             "price"=>$this->price,
             "stock"=>$this->stock,
             "category"=>$this->category->id,
            "subcategories"=>SubcategoryResource::collection($this->subcategories),

             "criterias"=>CriteriaResource::collection($this->criterias,$this->options),
             //"options"=>OptionResource::collection($this->options)

            
        ];
    }

    
    
   
    
}
