<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index () {
        return view ('profile', [
            "title" => "PROFILE",
            // "posts" => Post::all()
            "posts" => Post::latest()->get()
        ]);
    }

    public function show (Post $post) {
        return view ('portofolio', [
            "title" => "Portofolio 1",
            "post"  => $post
        ]);
    }
}
