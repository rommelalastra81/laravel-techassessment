<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\userRegistrationRequest;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function register_user(userRegistrationRequest $request)
    {


        $userEmail = User::where('email', $request->email)->get();

        if($userEmail != null)
        {
            $user = User::create([
                'name'              => $request->name,
                'email'             => $request->email,
                'password'          => $request->password,
                'is_deleted'        => false
                ]);
            
            return $user;
        } 
        else 
        {
            echo ("email is already in used");
        }
    }


    //login
    public function login_user(Request $request)
    {
       $validator =  $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
    
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // return redirect()->intended('dashboard')
            //             ->withSuccess('Signed in');

            return "login success";
        }
        $validator['emailPassword'] = 'Email address or password is incorrect.';
        return redirect("login")->withErrors($validator);
    }
    
}
