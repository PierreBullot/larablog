@extends('layouts/main')

@section('content')
	<div>{{ $destroyed }}</div>
	<br/>
	@auth()
		<a href="/articles/create">Créer un article</a>
	@endauth
	<br/><br/>
	
	<ul>
		@foreach ( $posts as $post )
			<li><a href="/articles/{{ $post->post_name }}">{{ $post->post_title }}</a></li>
			@auth()
				<form action="/articles/{{ $post->post_name }}" method="POST">
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="DELETE">
					<button type="submit" class="btn btn-secondary">delete</button><br/><br/>
				</form>
			@endauth
		@endforeach
	</ul>
@endsection
