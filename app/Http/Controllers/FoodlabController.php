<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class FoodlabController extends Controller
{
    public function getIndex() {
        $posts = Post::paginate(10);
        return view('foodlab.index')->withPosts($posts);
    }

    public function getSingle($slug) {
        //dohvatit iz baze na osnovu slug-a
        $post = Post::where('slug', '=', $slug)->first();
        //return the view
        return view('foodlab.single')->withPost($post);
    }
}
