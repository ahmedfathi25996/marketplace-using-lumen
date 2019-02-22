<?php

namespace App\Events;
use App\User;
class RegisterActivityEvent extends Event
{
     public $user;
     //public $request;
     
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        //$this->request=$request;
        
    }
    
}
