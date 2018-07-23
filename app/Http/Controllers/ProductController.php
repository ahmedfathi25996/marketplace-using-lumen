<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function addProduct(Request $request)
    {
        $this->validate($request, [
            'name'    => 'required',
            'description' => 'required',
            'price' => 'required',
            'qty' => 'required'
        ]);
        $product= new Product();
        $product->name=$request->input('name');
        $product->description=$request->input('description');
        $product->price=$request->input('price');
        $product->qty=$request->input('qty');
         if($product->save())
         {
            return response()->json(['status' =>'success','product'=>$product],201);

         }
         else{
             return response()->json(['status'=>'faild'],400);
         }
    }

    //
}
