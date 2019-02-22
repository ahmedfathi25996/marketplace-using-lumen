<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;


class RegisterActivityListner
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

   $logName=URL::current();
  activity()->causedBy($event->user->id)->useLog($logName)->userName($event->user->username)->log('Default Description');
}
}