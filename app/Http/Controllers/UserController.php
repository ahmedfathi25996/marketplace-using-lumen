<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Artical;
use App\Interfaces\UserInterface;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
   
public $user;

    public function __construct(UserInterface $user)
    {
                $this->user=$user;
    }

    public function postLogin(Request $request)
    {
    
        $this->validate($request, [
            'email'    => 'required|email|max:255',
            'password' => 'required',
        ]);
        return $this->user->login();
    }


    public function register(Request $request)
    {
        
        $this->validate($request, [
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password'=>'required',
            
        ]);
            
           $usr= $this->user->register([
          "username"=>$request->input('username'),
          "email"=>$request->input('email'),
          "password"=>app('hash')->make($request->input('password')),
          "api_token"=>str_random(60)

            ]);
            if($usr){
               event(new UserRegistered($usr));
               return response()->json(['status' =>'success','message'=>'activation has been sent check your mail','user'=>$usr],201);
                 

            }
  }
              
 
        
        
  

    public function verification($api_token)
    {
         $this->user->activation($api_token);
         if($this->user){

         return response()->json(['status'=>'success','message'=>'user activated successfult']);
       }
    }

   
  

}