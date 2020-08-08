<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Gallery;

class GalleryController extends Controller
{
    
	public function index(){

		$data = Gallery::all();
		return view('admin.gallery');
	}


	public function store(Request $request){

		$this->validate($request,[
			'filename' =>'required',
			'filename.*' => 'image|mimes:jpeg,png,svg,jpg,gif|max:9000'
			
		]);

		if ($request->hasfile('filename')) {
			foreach ($request->file('filename') as $image) {
				$name= $image->getClientOriginalName();
				$image->move(public_path().'/image/',$name);
				$data[] = $name;
			}
		}

		$uploadData = new Gallery;
		$uploadData->filename = json_encode($data);
		$success=$uploadData->save();
		if($success){
			$request->session()->flash('success','profile added successfully');
			}else{
				$request->session()->flash('error','opps! profile not uploaded');
			}
			
        return redirect()->route('gallery');
	}

}
