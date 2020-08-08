<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use App\Gallery;

class WelcomeController extends Controller
{
    public function index(){
	    $profile = Profile::all();
	    return view('welcome')->with('profile', $profile);
	}


    public function galleryshow(){
    	$data = Gallery::where('id','>=','1')->paginate(5);
    	// dd($gallery);
    	return view('frontend.galleryshow',compact('data'));
	}
}
