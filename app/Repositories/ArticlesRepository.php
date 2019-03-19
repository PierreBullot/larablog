<?php
namespace App\Repositories; //bien penser au namespace

use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;

class ArticlesRepository implements ArticlesRepositoryInterface
{
	public function destroy($post)
	{
		$article = \App\Post::where('post_name', $post)->first();
		
		foreach ( $article->comments as $comment )
		{
			$comment->delete();
		}
		
		$article->delete();
	}
	
	public function save(ArticleRequest $request)
	{
		$article = new \App\Post(); //on instancie un nouveau projet
		
		$article->post_author = Auth::id();
		$article->post_date = now();
		$article->post_content = request('post_content'); 
		$article->post_title = request('post_title');
		$article->post_status = request('post_status');
		$article->post_name = request('post_name');
		$article->post_type = 'article';
		$article->post_category = request('post_category');
		if (request('file') !== null )
		{
			$file = request('file');
			$file->move('uploads', $file->getClientOriginalName());
			$article->post_image = $file->getClientOriginalName();
		}
		
		$article->save();
	}
}
