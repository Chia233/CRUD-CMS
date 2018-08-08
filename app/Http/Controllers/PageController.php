<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
		$title= 'This is a test title';
		//Method 1:Passing through as compact id
		//return view('index', compact('title'));
		
		//Method 2:Passing $title variable that refers to id title
		//return view('index')->with('title',$title);
		
		//Return a REST array with $data passed to the server 
		$data= array(
		    'title' => 'Services',
			'services' => ['Create Classrooms', 'Assign Students/Teachers', 'Download PDF']
			);
			return view('index')->with($data);
	}
}
