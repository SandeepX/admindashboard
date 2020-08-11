<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable =['title','summary','description','author','status','image' ];



    public function getRules(){
    	return [
    		'title' => 'required|string',
    		'summary' => 'required|string|max:2000',
    		'description' => 'string|max:9000',
    		'author' => 'required|string|max:40',
    		'status' => 'required|in:active,inactive',
    		'image' =>'sometimes|image|mimes:jpeg,png,svg|max:5120|max:4096'
    	];
    }


}

	
