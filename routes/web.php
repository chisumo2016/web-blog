<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');

Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::get('/posts/tags/{tag}', 'TagsController@index');


Route::get('/register', 'RegistrationsController@create');
Route::post('/register', 'RegistrationsController@store');

Route::get('/login',     'SessionsController@create');
Route::post('/login',    'SessionsController@store');


Route::get('/logout',    'SessionsController@destroy');


/**  Service Container -----Binding  */


$stripe = App::make('App\Billing\Stripe'); // We resolve stripe key into the container




//
//App::bind('App\Billing\Stripe', function(){
//    return new  \App\Billing\Stripe(config('services.stripe.secret'));
//});
//$stripe = resolve('App\Billing\Stripe'); // We resolve stripe key into the container
//$stripe = app('App\Billing\Stripe'); // We resolve stripe key into the container

//dd($stripe);   // Dumping into the page