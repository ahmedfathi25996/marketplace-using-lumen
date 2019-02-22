<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\User;
class SendActivationMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
          
         Mail::send('mail',array(

             'email'=>$event->user->email,
             'api_token'=>$event->user->api_token),
     function($msg) use($event){ 
             $msg->to($event->user->email); 
            
             $msg->subject('Activation Mail');
         }); 

    }
}
