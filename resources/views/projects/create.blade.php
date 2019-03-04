<h1>Créer un nouveau projet</h1>
<form method="post" action="/projects">
	{{ csrf_field() }}
	<div>
		<input type="text" name="title" placeholder="Titre du projet">
	</div>
	<div>
		<textarea name="description" placeholder="Description du projet"></textarea>
	</div>
	<div>
		<button type="submit">Créer le projet</button>
	</div>
</form>
