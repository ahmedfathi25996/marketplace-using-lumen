<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Resources\ProductResource;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
        $this->app->register(\Tymon\JWTAuth\Providers\LumenServiceProvider::class);
        $this->app->configure('services');

        $this->app->singleton('mailer', function ($app) {
            return $app->loadComponent('mail', 'Illuminate\Mail\MailServiceProvider', 'mailer');
        });
        
        $this->app->alias('mailer', \Illuminate\Contracts\Mail\Mailer::class);
        
     $this->app->bind('App\Interfaces\UserInterface','App\Repositories\UserRepository');
     $this->app->bind('App\Interfaces\OrderInterface','App\Repositories\OrderRepository');
     $this->app->bind('App\Interfaces\ProductInterface','App\Repositories\ProductRepository');
     $this->app->bind('App\Interfaces\RatingInterface','App\Repositories\RatingRepository');
     $this->app->bind('App\Interfaces\CriteriaInterface','App\Repositories\CriteriaRepository');
     $this->app->bind('App\Interfaces\CriteriaoptionInterface','App\Repositories\CriteriaoptionRepository');
     $this->app->bind('App\Interfaces\CategoryInterface','App\Repositories\CategoryRepository');
     $this->app->bind('App\Interfaces\SubcategoryInterface','App\Repositories\SubcategoryRepository');
     $this->app->bind('App\Interfaces\CouponInterface','App\Repositories\CouponRepository');


    }
    }
    

