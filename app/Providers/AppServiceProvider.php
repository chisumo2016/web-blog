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

            $archieve = \App\Post::archieve();
            $tags      =  \App\Tag::has('posts')->pluck('name');

            $view->with(compact('archieve','tags'));



            //$view->with('archieve', );
            //$view->with('tags',); //$view->with('tags', \App\Tag::pluck('name'));   //$view->with('tags', App\Tag::all());
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
