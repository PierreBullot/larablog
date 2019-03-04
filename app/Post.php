<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
	* Get the user that authored the post.
	*/
	public function author()
	{
		return $this->belongsTo('App\User', 'post_author');
	}
	
	public function comments()
	{
		return $this->hasMany('App\Comment', 'post_id')->orderBy('comment_date', 'desc');
	}
}
