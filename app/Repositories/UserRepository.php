<?php 

namespace App\Repositories;
use App\Interfaces\UserInterface;
use App\User;
use App\Events\RegisterActivityEvent;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Scope;
use App\Events\UserRegistered;
use Tymon\JWTAuth\JWTAuth;
use App\Jobs\NewsletterJob;
use App\Http\Resources\ActivityResource;

class UserRepository implements UserInterface {


public $user;

	public function __construct(User $user,JWTAuth $jwt,Request $request){
       $this->user=$user;
        $this->jwt = $jwt;
        $this->request=$request;
	}

	
	  public function register(array $data)
	  {

	  	 
        return $this->user->create($data);
        
      }
    
	 public function activation($api_token)
	 {
	 	 $user= $this->user->active($api_token);
         $user->activated=1;
         $user->save();
       
	 }

	 
	 public function login(){
	 	  try {

            if (! $token = $this->jwt->attempt($this->request->only('email', 'password'))) {
                return response()->json(['user_not_found'], 404);
            }
            
                
           

        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent' => $e->getMessage()], 500);

        }
       
           event(new RegisterActivityEvent(Auth::user()));
        return response()->json(compact('token'),201);
        
	 }

	

  


}
    


