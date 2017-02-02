<?php

namespace App\Http\Requests;

use App\User;
use App\Mail\Welcome;
use Illuminate\Contracts\Facades\Mail;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //

            // validate the form

                'name'     =>   'required',
                'email'    =>   'required|email',
                'password' =>   'required|confirmed'
            ];
    }

    public  function persist()
    {
        // Create a user
          $user = User::create(
              $this->only(['name', 'email','password'])
          );

          //U  can use this or the above which is more cleaner
//        $user = User::create([
//            'name' => $request->get('name'),
//            'email' => $request->get('email'),
//            'password' => bcrypt($request->get('password'))
//        ]);

        //Sign them in
        auth()->login($user);

        //Sending an email
        \Mail::to($user)->send(new Welcome($user));
    }
}
