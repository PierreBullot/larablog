<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
	{
		return view('contact');
	}
	
	public function store(ContactRequest $request)
	{
		$contact = new \App\Contact(); //on instancie un nouveau projet
		
		$contact->contact_name = request('contact_name'); 
		$contact->contact_email = request('contact_email');
		$contact->contact_message = request('contact_message');
		$contact->contact_date = now();
		
		$contact->save();
		
		$contacts = \App\Contact::orderBy('contact_date', 'desc')->get();
		
		return view('confirm', array(
			'contacts' => $contacts
		));
		
		
		//~ return view('contact', array(
			//~ 'result' => 'Merci de nous avoir contacté!',
			//~ 'contacts' => $contacts
		//~ ));
	}
}
