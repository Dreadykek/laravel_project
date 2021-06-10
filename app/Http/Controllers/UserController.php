<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function delete($id){
        $user = User::where('id', $id);
        $user->delete();
        return redirect(route('index'));
    }

    public function temp($id){
        $user = User::where('id', $id);
        return view('update', ['user' => $user]);
    }

    public function update(Request $request){
        $validateFields = $request->validate([
            'email' => 'required|email',
            'c_email' => 'required|email'
        ]);
        $user = User::where('email', $validateFields['email']);
        $user->update(array('email'=>$validateFields['c_email']));
        return redirect(route('index'));

    }
}
