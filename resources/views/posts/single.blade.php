@extends('layouts/main')

@section('content')
	@can('update', $post)
		<a href="/articles/{{ $post->post_name }}/edit">Editer</a>
	@endcan
	
	<h1>{{ $post->post_title }}</h1>
	
	<h2>{{ $post->author->username }}</h2>
	
	@if(isset($post->post_image))
		<img src="/uploads/{{ $post->post_image }}" />
	@endif
	
	<p>{{ $post->post_content }}</p>
	
	<h3>Commentaires</h3>
	
	<form action="{{ url('/articles/comment') }}" method="POST">
		{{ csrf_field() }}
		<div class="form-group">
			<input type="text" class="form-control {{ $errors->has('comment_name') ? 'is-invalid' : '' }}" name="comment_name" id="comment_name" placeholder="Votre nom"
				value="{{ old('comment_name') }}"> {!! $errors->first('comment_name', '
			<div class="invalid-feedback">:message</div>') !!}
		</div>
		<div class="form-group">
			<input type="email" class="form-control {{ $errors->has('comment_email') ? 'is-invalid' : '' }}" name="comment_email" id="comment_email" placeholder="Votre email"
				value="{{ old('comment_email') }}"> {!! $errors->first('comment_email', '
			<div class="invalid-feedback">:message</div>') !!}
		</div>
		<div class="form-group">
			<textarea class="form-control {{ $errors->has('comment_content') ? 'is-invalid' : '' }}" name="comment_content" id="comment_content" placeholder="Votre message">{{ old('comment_content') }}</textarea>
				{!! $errors->first('comment_content', '
			<div class="invalid-feedback">:message</div>') !!}
		</div>
		
		<input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}" />
		
		<button type="submit" class="btn btn-secondary">Envoyer !</button><br/><br/>
	</form>
	
	<ul>
		@foreach ( $post->comments as $comment )
			<li>
				<h4>{{ $comment->comment_name }}</h4>
				{{ $comment->comment_date }}<br/>
				{{ $comment->comment_content }}<br/><br/>
			</li>
		@endforeach
	</ul>
@endsection
