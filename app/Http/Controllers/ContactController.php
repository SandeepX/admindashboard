<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Mapper;

class ContactController extends Controller
{
    public function index(){

        Mapper::map(
            27.717245,
            85.323959,
             [
                'zoom'=>16,
                'draggable'=>true,
                'marker'=>false,
                'eventAfterLoad' =>
                'circleListener(maps[0].shapes[0].circle_0);'
             ]
         );

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
