<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function __construct()  // Last
    {
        $this->middleware('guest', ['except' => 'destroy']); // Only guest are allowed to make through filter
    }

    //
    public function  create()
    {
            return view ('sessions.create');
    }

    public function store()
    {
        // Attempt to authenticate the user
        if (!auth()->attempt(request(['email', 'password']))){
            //If not , redirect back
            return  back()->withErrors([
                'message' => 'Please check your credintials  and try again'
            ]);
        }
        //If so sign them  in

        //Redirect tpo the home page
        return redirect()->home();
    }

    public function  destroy()
    {
        auth()->logout();
        return redirect()->home();
    }
}
