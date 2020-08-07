<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;

class WelcomeController extends Controller
{
    public function index(){
	    $profile = Profile::all();
	    // dd($profile);
	    return view ('welcome')->with('profile', $profile);
    }
}
