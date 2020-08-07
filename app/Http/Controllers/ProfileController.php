<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use File;

use App\Profile;

class ProfileController extends Controller
{
   
   public function index(){
   	 return view('admin.profile');
   }

	public function store(Request $request){
		$data = new Profile;

   		if ($request->hasFile('image')) {
			$validated = $request->validate([
			    'name' => 'required|string|max:40',
			    'image' => 'required|mimes:jpeg,png,svg|max:5120',
			    'work' => 'required|string|max:50',
			]);
            
	        if ($request->file('image')->isValid()) {
	        	$upload_dir = public_path().'/uploads/profile' ;
	            if(!File::exists($upload_dir)){
	            	File::makeDirectory($upload_dir,0777,true,true);
	        	}
	        	
	        	$file_name = "Profile-".date('Ymdhis').rand(0,999).".".$request->image->getClientOriginalExtension();
	        	$success = $request->image->move($upload_dir, $file_name);

	        	if($success){
	        		$data['url'] = $file_name;
	        	}else{
	        		$data['url'] = null;
	        	}

	            $file = Profile::create([
	               'name' => $validated['name'],
	                'url' => $file_name,
	                'work' =>$validated['work'],
	            ]);
	            Session::flash('success', "Success!");
	            return \Redirect::back();
	        }
	    }
	    abort(500, 'Could not upload image :(');
    } 

    
}
