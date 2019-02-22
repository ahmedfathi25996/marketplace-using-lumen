<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Contracts\Encryption\DecryptException;

class SubcategoryResource extends Resource
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
           
             "name"=>$this->name
             
            
            
        ];

    }
    
}
