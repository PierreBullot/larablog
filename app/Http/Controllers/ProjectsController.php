<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//~ use App\Project;

class ProjectsController extends Controller
{
    public function index()
	{
		$projects = \App\Project::all();
		//~ $projects = Project::all();
		//~ return $projects;
		
		return view('projects.index', ['projects' => \App\Project::all()]);
	}
	
	function create()
	{
		return view('projects.create');
	}
	
	function store()
	{
		$project = new \App\Project(); //on instancie un nouveau projet
		
		$project->title = request('title'); //on set le titre avec la donnée envoyée du formulaire
		$project->description = request('description');
		
		$project->save(); // on enregistre dans la base
		
		return redirect('/projects');
	}
	
}
