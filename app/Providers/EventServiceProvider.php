<?php

namespace App\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\UserRegistered' => [
            'App\Listeners\SendActivationMail',
            'App\Listeners\RegisterActivityListner',
        ],

        //  'App\Events\RegisterActivityEvent' => [
        //     'App\Listeners\RegisterActivityListner',
        // ],

        'App\Events\InvoiceEvent' => [
            'App\Listeners\InvoiceListner',
        ],
        
    ];
}
