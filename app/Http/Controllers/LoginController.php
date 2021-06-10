<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        if(auth()->check()){
            return redirect(route('user.private'));
        }

        $formFields = $request->only(['email', 'password']);

        if(auth()->attempt($formFields)){
            return redirect()->intended(route('user.private'));
        }

        return redirect(route('user.login'))->withErrors([
            'email' => 'Не удалось авторизоваться'
        ]);
    }

}
