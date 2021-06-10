<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function save(Request $request){
        if(auth()->check()){
            return redirect(route('user.private'));
        }

        $validateFields = $request->validate([
           'email' => 'required|email',
           'password' => 'required'
        ]);

        if(User::where('email', $validateFields['email'])->exists()){
            return redirect()->to(route('user.registration'))->withErrors([
                'email' => 'Такой пользователь уже есть'
            ]);
        };

        $user = User::create($validateFields);
        if($user){
            auth()->login($user);
            return redirect()->to(route('user.private'));
        }
        return redirect()->to(route('user.private'))->withErrors([
            'formError' => 'Произошла ошибка при сохранении пользователя'
        ]);
    }
}
