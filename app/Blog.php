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
    		'status' => 'in:active,inactive',
    		'image' =>'sometimes|mimes:jpeg,png,svg,mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:10240'
    	];
    }


}

	
