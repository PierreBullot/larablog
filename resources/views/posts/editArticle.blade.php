@extends('layouts/main')

@section('content')
	<form action="/articles/{{ $article->post_name }}" method="POST">
		{{ csrf_field() }}
		<div class="form-group">
			<input type="text" class="form-control {{ $errors->has('post_title') ? 'is-invalid' : '' }}" name="post_title" id="post_title"
				value="{{ $errors->has('post_title') ? old('post_title') : $article->post_title }}"> {!! $errors->first('post_title', '
			<div class="invalid-feedback">:message</div>') !!}
		</div>
		<div class="form-group">
			<textarea class="form-control {{ $errors->has('post_content') ? 'is-invalid' : '' }}" name="post_content" id="post_content">{{ $errors->has('post_content') ? old('post_content') : $article->post_content }}</textarea>
				{!! $errors->first('post_content', '
			<div class="invalid-feedback">:message</div>') !!}
		</div>
		<div class="form-group">
			<input type="text" class="form-control {{ $errors->has('post_status') ? 'is-invalid' : '' }}" name="post_status" id="post_status"
				value="{{ $errors->has('post_status') ? old('post_status') : $article->post_status }}"> {!! $errors->first('post_status', '
			<div class="invalid-feedback">:message</div>') !!}
		</div>
		<div class="form-group">
			<input type="text" class="form-control {{ $errors->has('post_category') ? 'is-invalid' : '' }}" name="post_category" id="post_category"
				value="{{ $errors->has('post_category') ? old('post_category') : $article->post_category }}"> {!! $errors->first('post_category', '
			<div class="invalid-feedback">:message</div>') !!}
		</div>
		
		<input type="hidden" name="_method" value="PUT">
		
		<button type="submit" class="btn btn-secondary">Envoyer !</button><br/><br/>
	</form>
@endsection
