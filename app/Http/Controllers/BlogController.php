<?php

namespace blog\Http\Controllers;

use Illuminate\Http\Request;
use blog\Post;

class BlogController extends Controller
{
    public function getSingle($slug) {

    	$post = Post::where('slug', '=', $slug)->first();
    	return view('blog.single')->with('post', $post);
    
    }

    public function getIndex() {

    	return redirect('/');

    }
}
