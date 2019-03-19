@extends('layouts/main')

@section('content')
	<form action="{{ url('/articles') }}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-group">
			<input type="text" class="form-control {{ $errors->has('post_title') ? 'is-invalid' : '' }}" name="post_title" id="post_title" placeholder="Titre"
				value="{{ old('post_title') }}"> {!! $errors->first('post_title', '
			<div class="invalid-feedback">:message</div>') !!}
		</div>
		<div class="form-group">
			<input type="text" class="form-control {{ $errors->has('post_name') ? 'is-invalid' : '' }}" name="post_name" id="post_name" placeholder="Nom"
				value="{{ old('post_name') }}"> {!! $errors->first('post_name', '
			<div class="invalid-feedback">:message</div>') !!}
		</div>
		<div class="form-group">
			<textarea class="form-control {{ $errors->has('post_content') ? 'is-invalid' : '' }}" name="post_content" id="post_content" placeholder="Article">{{ old('post_content') }}</textarea>
				{!! $errors->first('post_content', '
			<div class="invalid-feedback">:message</div>') !!}
		</div>
		<div class="form-group">
			<input type="text" class="form-control {{ $errors->has('post_status') ? 'is-invalid' : '' }}" name="post_status" id="post_status" placeholder="Status"
				value="{{ old('post_status') }}"> {!! $errors->first('post_status', '
			<div class="invalid-feedback">:message</div>') !!}
		</div>
		<div class="form-group">
			<input type="text" class="form-control {{ $errors->has('post_category') ? 'is-invalid' : '' }}" name="post_category" id="post_category" placeholder="Catégorie"
				value="{{ old('post_category') }}"> {!! $errors->first('post_category', '
			<div class="invalid-feedback">:message</div>') !!}
		</div>
		<div class="form-group">
			<label>Image à upload:</label>
			<input type="file" name="file" id="file">
		</div>
		<button type="submit" class="btn btn-secondary">Envoyer !</button><br/><br/>
	</form>
@endsection
