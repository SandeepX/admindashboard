<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title','link','description']; 

    public function getRules(){
    	return [
    		'title' => 'required|string',
    		'link' => 'required|url',
    		'description' => 'required|string|max:500'
    		
    	];
    }

}
