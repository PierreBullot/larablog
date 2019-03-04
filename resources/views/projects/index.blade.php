<h1>Projects</h1>
	<ul>
	@foreach ($projects as $project)
		<li><a href="/projects/{{ $project->id }}">{{ $project->title }}</a></li>
	@endforeach
	</ul>
	
	<a href="/projects/create">Nouveau projet</a><br/>
{{ $projects }}
