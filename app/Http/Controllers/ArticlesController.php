<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Requests\ArticleRequest;
use App\Repositories\ArticlesRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'storeComment']]);
    }
	
    public function index()
	{
		$posts = \App\Post::get();
		return view('articles', array(
			'posts' => $posts,
			'destroyed' => ''
		));
	}
	
	public function show($post_name) {
		$post = \App\Post::where('post_name', $post_name)->first(); //get post
		return view('posts/single', array( //Pass the post to the view
			'post' => $post
		));
	}
	
	public function storeComment(CommentRequest $request)
	{
		$comment = new \App\Comment(); //on instancie un nouveau projet
		
		$comment->post_id = request('post_id');
		$comment->comment_name = request('comment_name'); 
		$comment->comment_email = request('comment_email');
		$comment->comment_content = request('comment_content');
		$comment->comment_date = now();
		
		$comment->save();
		
		//~ dd($comment);die;
		
		return back();
	}
	
	public function create()
    {
        return view('posts/newArticle');
    }

    public function store(ArticleRequest $request, ArticlesRepositoryInterface $articlesRepository)
    {
		$articlesRepository->save($request);
		
		return $this->index();
    }
	
	public function edit($post_name)
    {
		$article = \App\Post::where('post_name', $post_name)->first();
		$user = Auth::user();
		
		if ($user->can('update', $article))
		{
	        return view('posts/editArticle', array(
				'article' => $article
			));
		}
		else
		{
			return $this->show($post_name);
		}
    }

    
    public function update(ArticleRequest $request, $post_name)
    {
		
        $article = \App\Post::where('post_name', $post_name)->first();
		$user = Auth::user();
		
		if ($user->can('update', $article))
		{
			$article->post_content = request('post_content'); 
			$article->post_title = request('post_title');
			$article->post_status = request('post_status');
			$article->post_category = request('post_category');
			
			$article->save();
		}
		
		return $this->show($post_name);
    }

    
    public function destroy($post_name, ArticlesRepositoryInterface $articlesRepository)
    {
        $article = \App\Post::where('post_name', $post_name)->first();
		$user = Auth::user();
		
		if ($user->can('delete', $article))
		{
			$articlesRepository->destroy($post_name);
			
	        $posts = \App\Post::get();
			return view('articles', array(
				'posts' => $posts,
				'destroyed' => 'Article supprimé avec succès!'
			));
		}
		else
		{
			$posts = \App\Post::get();
			return view('articles', array(
				'posts' => $posts,
				'destroyed' => 'Vous ne pouvez pas supprimer cet article!'
			));
		}
    }
}
