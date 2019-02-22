<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Product;
use App\User;
use App\Criteria;
use App\Subcategory;
use App\Option;
class ProductTest extends TestCase
{
use DatabaseTransactions;
    

    public function test_show_all_products()
    {
         
        $log_user=factory('App\User')->create();
        $products=factory('App\Product')->create();
        $response=$this->actingAs($log_user);
        
        $response->get('/products/getproducts');
        $response->seeStatusCode(200);
          $response->seeJson([
          'product_id'=>$products->id,
          'name'=>$products->name,
          'description'=>$products->description,
          'price'=>$products->price,
          'stock'=>$products->stock,
          
]);


   
     }

    


     public function test_add_rating()
     {

          $user=factory('App\User')->create();
         
         $product=factory('App\Product')->create();
         $response=$this->actingAs($user);
        $data=['rating'=>4];
          $response->json('POST','/products/addrating/{$product->id}',$data);
          $response->seeStatusCode(201);
     }


     public function test_sort_products()
     {
        $user=factory('App\User')->create();
        $product=factory('App\Product')->create();
        $response=$this->actingAs($user);
        $data=['orderBy'=>'price','type'=>'asc','sub_category'=>'test'];
         $response->json('POST','/products/sort',$data);

          $response->seeStatusCode(200);



     }

     public function test_filter_products()
     {
        $user=factory('App\User')->create();
        $product=factory('App\Product')->create();
        $response=$this->actingAs($user);
        $data=['rating_value'=>4,'criteria_option'=>'test','sub_category'=>'test'];
         $response->json('POST','/products/filter',$data);

          $response->seeStatusCode(200);
     }


     public function test_add_criteria()
     {
        $user=factory('App\User')->create();
         $response=$this->actingAs($user);
         $data=['name'=>'test'];
         $response->json('POST','/products/addcriteria',$data);

          $response->seeStatusCode(201);

     }

 public function test_add_criteria_option()
     {
       $user=factory('App\User')->create();
        $criteria=factory('App\Criteria')->create();
        $option=factory('App\Option')->create(['criteria_id'=>$criteria->id]);
        $option->criteria()->associate($criteria);
        $option->save();
     $response=$this->actingAs($user);
     
      
     $data=['name'=>'test','criteria_id'=>1];
      $response->json('POST','/products/addcriteriaoption');

        

          $response->seeStatusCode(201);

     }

    

     public function test_add_category()
     {
        $user=factory('App\User')->create();
         $response=$this->actingAs($user);
         $data=['name'=>'test'];
         $response->json('POST','/products/addcategory',$data);

          $response->seeStatusCode(201);
     }


     

     
      

      


     
}