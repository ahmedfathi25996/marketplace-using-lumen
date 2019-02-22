<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\User;

class UserTest extends TestCase
{
use DatabaseTransactions;
    

    public function test_register_user()
    {
         
         $data=[
            "username"=>"test",
            "email"=>"test@test.com",
            "password"=>"secret",

         ];

         $response=$this->json('POST','/register',$data);
         $response->seeStatusCode(201);
        






   
     }

    public function test_login_user()
        {
      $user = factory(User::class)->create([
            'email' => 'test@test.com',
            'password' =>app('hash')->make('123456'),
        ]);

        $data = ['email' => 'test@test.com', 'password' => '123456'];

        $this->json('POST', '/login', $data)->seeStatusCode(201);

        }

       

       
     
      

      


     
}