<?php

namespace App\Listeners;

use App\Events\InvoiceEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class InvoiceListner
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
     * @param  ExampleEvent  $event
     * @return void
     */
    public function handle(InvoiceEvent $event)
    {
          
          
         Mail::send('invoice',array(
            'email'=>$event->user->email
         ),

     function($msg) use($event){ 
             $msg->to($event->user->email); 
            
             $msg->subject('Invoice Mail');
         });
    }
}
