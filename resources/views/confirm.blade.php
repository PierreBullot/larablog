@extends('layouts/main')

@section('title')
@endsection

@section('content')
	<h1>Merci de nous avoir contacté!</h1>
	
	<h3>Demandes de contact effectuées :</h3>
	<ul>
		@foreach ( $contacts as $contact )
			<li>{{ $contact->contact_name }}, {{ $contact->contact_date }}</li>
		@endforeach
	</ul>
@endsection


