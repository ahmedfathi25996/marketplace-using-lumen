<?php

namespace App\Jobs;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

use App\Order;
use Illuminate\Support\Facades\Auth;

class InvoiceJob extends Job implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;
    public $data;
    public $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data,$user)
    {
        $this->data = $data;
        $this->user=$user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Request $request)
    {
      
         Mail::send('invoice',$this->data,function($message)
     {    
         $message->to($this->user)->subject('Invoice Mail');  
          
     });   
    
    

    }

}
