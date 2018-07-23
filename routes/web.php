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
/*
          User Routes
*/
$router->group(['prefix' => 'api/users'], function () use ($router) {
    $router->post('/register','UserController@register');

    $router->get('/getSpacificUser/{id}','UserController@getSpacificUser');
    
    
    
    $router->get('/activation/{api_token}',['as'=>'activation','uses'=>'UserController@activation']);
    $router->post('/login', 'UserController@postLogin');
    
    
    $router->group(['middleware' => ['auth:api','role','activate']],function($api) use($router){
    $router->put('/update/{id}','UserController@update');
   
    
    });
    $router->get('/usersOrders','UserController@usersOrders');
    $router->delete('/delete/{id}','UserController@delete');
});
 $router->get('/ordersProducts/{id}','OrderController@OrdersProducts');



/*
         Order And Product Routes
*/
$router->group(['middleware' => ['auth:api','role','activate']],function($api) use($router){
    $router->post('/addProduct','ProductController@addProduct');
     //$router->get('/ordersProducts/{id}','OrderController@OrdersProducts');
});

//$router->get('/allorders/{id}','OrderController@getAllOrders');

