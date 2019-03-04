@extends('layouts/main')

@section('content')
	<h1>{{ $post->post_title }}</h1>
	
	<h2>{{ $post->author->username }}</h2>
	
	<p>{{ $post->post_content }}</p>
	
	<ul>
		@foreach ( $post->comments as $comment )
			<li>
				<h3>{{ $comment->comment_name }}</h3>
				{{ $comment->comment_date }}<br/>
				{{ $comment->comment_content }}<br/><br/>
			</li>
		@endforeach
	</ul>
@endsection
