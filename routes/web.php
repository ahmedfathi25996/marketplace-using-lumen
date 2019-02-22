<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

    $router->post('/register','UserController@register');
    $router->get('/activation/{api_token}',['as'=>'activation','uses'=>'UserController@verification']);
    $router->post('/login', 'UserController@postLogin');
    $router->group(['middleware' => ['auth:api','activate']],function($api) use($router){
         $router->post('/products/sort','ProductController@sort');    
            $router->post('/products/filter','ProductController@filter');  
            $router->post('/orders/addorder','OrderController@addOrder');
  $router->group(['middleware' => ['role']],function($api) use($router){
 
            $router->get('/orders/getorders','OrderController@getOrders');

            $router->post('/orders/addpromocode','CouponController@addPromoCode');    
            $router->post('/products/addrating/{id}','RatingController@addRating');    
             
             $router->post('/products/addproduct','ProductController@addProduct');
              $router->post('/products/addcriteria','CriteriaController@addCriteria');
             $router->post('/products/addcriteriaoption','CriteriaoptionController@addCriteriaOption');
             $router->post('/products/addcategory','CategoryController@addCategory');
             $router->post('/products/addsubcategory','SubcategoryController@addSubCategory');
             $router->get('/products/getproducts','ProductController@getProducts');
              $router->post('/orders/showsoldproducts','OrderController@showSoldProducts');

            


  });

           



     
    }); 

    
