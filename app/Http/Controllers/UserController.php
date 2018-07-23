<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\UserResource;
use App\Order;
use Illuminate\Database\Eloquent\Scope;



class UserController extends Controller
{
    /**
     * @var \Tymon\JWTAuth\JWTAuth
     */
   // protected $jwt;

    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
    }

    public function postLogin(Request $request)
    {
    
        $this->validate($request, [
            'email'    => 'required|email|max:255',
            'password' => 'required',
        ]);

        try {

            if (! $token = $this->jwt->attempt($request->only('email', 'password'))) {
                return response()->json(['user_not_found'], 404);
            }
            
                
           

        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent' => $e->getMessage()], 500);

        }
        

        return response()->json(compact('token'),201);
    }


    public function register(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password'=>'required'
        ]);
        
        $user= new User();
        $user->username= $request->input('username');
        $user->email=$request->input('email');
        
        
        $user->password=app('hash')->make($request->input('password'));

        $user->api_token= str_random(30);
        if($user->save())
        {
           
            
            Mail::send('mail',array(

                'email'=>$user->email,
                'api_token'=>$user->api_token),
        function($msg) use($user){ 
                $msg->to($user->email); 
                
                $msg->subject('Activation Mail');
            }); 
            
                       return response()->json(['status' =>'success','message'=>'activation has been sent check your mail','user'=>$user],201);
        }
          

         
    }
       
      
        
        
  

    public function activation($api_token)
    {
        $user= User::active($api_token);
        if( $user)
        {
            $user->activated= 1;
            
            $user->save();
        }
    }

    public function getSpacificUser($id)
    {
        $user=User::find($id);
        return response()->json(['user'=>$user],200);

    }

    public function usersOrders()
    {
        //get the orders by user

          $users=User::allUsersOrders('orders');
          return UserResource::collection($users);

    }

    public function update(Request $request,$id)
    { 
        //you need to add api_token to be authorized to use update function

        $this->validate($request, [
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password'=>'required'
        ]);
        $user= User::find($id);
        $user->username=$request->input('username');
        $user->email=$request->input('email');
        $user->password=app('hash')->make($request->input('password'));
        if($user->save()){
            return response()->json(['status' =>'success','user'=>$user]);

        }

    }

    public function delete($id)
    { 
        //you need to add api_token to be authorized to use delete function

        $user=User::find($id);
        if(! $user->delete()){
            return response()->json(['status' =>'failed','message'=>'Bad Request'],400);
        }
        else{
            return response()->json(['status' =>'success','message'=>'User Deleted Successfuly'],200);
   
        }

        

    }
}
