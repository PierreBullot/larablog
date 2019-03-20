<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
</head>
<body>
	<div>
		<p>Un commentaire a été posté sur l'article <a href="localhost:8000/articles/{{ $comment->post->post_name }}">{{ $comment->post->post_title }}</a> :</p>
	
		{{ $comment->comment_name }}<br/>
		{{ $comment->comment_date }}<br/>
		{{ $comment->comment_content }}<br/><br/>
	</div>
</body>
</html>
