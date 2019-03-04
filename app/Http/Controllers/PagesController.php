<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
	{
		return view('welcome', [
			'test' => 'Mon test'
		]);
	}
	
	public function about()
	{
		return view('about', [
			'monTitre' => 'About'
		]);
	}
	
	public function contact()
	{
		return view('contact', [
			'monTitre' => 'Contact'
		]);
	}
}
