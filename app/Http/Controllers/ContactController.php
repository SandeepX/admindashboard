<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function index(){

    	return view('frontend.contact');
    }

    public function store(Request $request){
    	$this->validate($request, [ 
    		'name' => 'required', 
    		'email' => 'required|email',
    		'subject' =>'required',
    		'message' => 'required' ]);
    	$data = Contact::create($request->all());
    	if($data){
			$request->session()->flash('success','Thank you for contacting');
		}else{
			$request->session()->flash('error','opps! mesasage not sent');
		}
		
        return redirect()->route('ContactMe');
    }	

}
