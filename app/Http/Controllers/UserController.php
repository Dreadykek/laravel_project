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
        $user = User::where('id', $id)->first();
        return view('update', ['user' => $user]);
    }

    public function update(Request $request, $id){
//        dd($id);
        $validateFields = $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('id', $id)->first();
        $user->update(array('email'=>$validateFields['email']));
        return redirect(route('index'));

    }
}
