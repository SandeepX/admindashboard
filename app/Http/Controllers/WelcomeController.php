<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use App\Gallery;
use App\Project;
use App\Video;

class WelcomeController extends Controller
{
    public function index(){

    	$aboutdata = "While I am kind of a jill-of-all-trades in the creative industry, I specialize in laravel web development & front-end development . I've been in the  web development scene for 3 years. Many of my peers call me a passionate perfectionist. Hmm, I think you should try working with me and see? ;-).";

    	$videodata = Video::latest()->take(2)->get();
	    $profile = Profile::latest()->take(1)->get();
	    $projectdetail = Project::latest()->take(3)->get();
	  
	    return view('welcome')
	    ->with('aboutdata', $aboutdata)
	    ->with('videodata', $videodata)
	    ->with('projectdetail',$projectdetail)
	    ->with('profile', $profile);
	}


    public function galleryshow(){
    	$data = Gallery::paginate(5);
    	// dd($gallery);
    	return view('frontend.galleryshow',compact('data'));
	}
}
