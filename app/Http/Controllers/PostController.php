<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\models\Post;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();
        return response()->json(['posts'=>$posts], 200);
        //return view('post.index', ['posts' => $posts]);
    }
}
