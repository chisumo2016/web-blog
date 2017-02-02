<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
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


    public function  store(RegistrationRequest  $request)
    {

        $request->persist();

        //Flash Message
        session()->flash('message' , 'Thanks so much for signing up');
        //redirect to the home page
        return redirect()->home();

    }


}


        // validate the form  --This code has been mode to RegistrationRequest class
//        $this->validate(request(),[
//            'name'     =>   'required',
//            'email'    =>   'required|email',
//            'password' =>   'required|confirmed'
//        ]);


         // $request->persist();//        // Session message
       //session('message', 'Here is default message');
// create and save the user
        //$user = User::create(['name','email','password'];
//         $user = User::create([
//             'name' => $request->get('name'),
//             'email' => $request->get('email'),
//             'password' => bcrypt($request->get('password'))
//         ]);
//
//         //Sign them in
//         auth()->login($user);
//
//         //Sending an email
//        \Mail::to($user)->send(new Welcome($user));
//
//        $request->persist();
//        // Session
//        session('message', 'Here is default message');
//        //redirect to the home page
//        return redirect()->home();



