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
		$about = "<p>
                Curabitur eget semper ante. Morbi eleifend ultricies est, a blandit diam vehicula vel. Vestibulum porttitor nisi quis viverra hendrerit. Suspendisse vel volutpat nibh, vel elementum lacus. Maecenas commodo pulvinar dui, at cursus metus imperdiet vel. Vestibulum et efficitur urna. Duis velit nulla, interdum sed felis sit amet, facilisis auctor nunc. Cras luctus urna at risus feugiat scelerisque nec sed diam.
                </p>

                <p>
						What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry

                </p>"; 
    	return view('frontend.about')
    	->with('profileImage',$profileImage)
    	->with('data', $data)
    	->with('about',$about);
    
		
    }
}
