<?php
namespace App\Repositories; //bien penser au namespace

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
}
