<?php

namespace App\Http\Controllers;

use App\Mail\Welcome;
use App\User;

use Illuminate\Http\Request;
use Mail;

class RegistrationsController extends Controller
{
    //

    public function  create()
    {
       return view('registration.create');
    }


    public function  store(Request $request)
    {
        // validate the form
        $this->validate(request(),[
            'name'     =>   'required',
            'email'    =>   'required|email',
            'password' =>   'required|confirmed'
        ]);

        // create and save the user
        //$user = User::create(['name','email','password'];
         $user = User::create([
             'name' => $request->get('name'),
             'email' => $request->get('email'),
             'password' => bcrypt($request->get('password'))
         ]);

         //Sign them in
         auth()->login($user);

         //Sending an email
        \Mail::to($user)->send(new Welcome($user));

        //redirect to the home page
        return redirect()->home();

    }
}
