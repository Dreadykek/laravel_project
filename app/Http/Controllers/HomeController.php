<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function show(){
        $users = User::get();

        return view('index', ['users' => $users]);
    }

}
