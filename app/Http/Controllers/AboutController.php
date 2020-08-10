<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profile;
use App\Gallery;


class AboutController extends Controller
{
    public function index(){
    	$profileImage = Profile::take(1)->get();
    	$data = Gallery::latest()->take(5)->get();
		$about = "<p>While I am kind of a jill-of-all-trades in the creative industry, I specialize in laravel web development & front-end development . I've been in the  web development scene for 3 years. Many of my peers call me a passionate perfectionist. Hmm, I think you should try working with me and see? ;-). </p> "; 
    	return view('frontend.about')
    	->with('profileImage',$profileImage)
    	->with('data', $data)
    	->with('about',$about);
    
		
    }
}
