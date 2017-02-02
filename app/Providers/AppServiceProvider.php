<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Billing\Stripe;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Composer  View

        view()->composer('partials.sidebar' , function($view){

            $view->with('archieve', \App\Post::archieve());
        });
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
         //Registering Service Provider into service container

       // \App::singleton('App\Billing\Stripe', function(){ use this or the below
        $this->app->singleton(Stripe::class, function(){
            return new  Stripe(config('services.stripe.secret'));
           // return new  \App\Billing\Stripe(config('services.stripe.secret'));

        });
    }
}
