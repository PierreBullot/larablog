<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
	{
		return view('articles');
	}
	
	public function show($post_name) {
		$post = \App\Post::where('post_name', $post_name)->get(); //get post
		return view('posts/single', array( //Pass the post to the view
			'post' => $post[0]
		));
	}
}
