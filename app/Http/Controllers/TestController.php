<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class TestController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('post.test', compact("posts"));
    }
}
