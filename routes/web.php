<?php

use Illuminate\Support\Facades\Route;




Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');



/****************download******************/
Route::get('/download', function(){
	$file = public_path()."/sandeep.docx";
	$headers =array(
		'content_Type: application/docx',

	);
	return Response::download($file,"sandeep.docx",$headers);
});



Route::get('/', 'welcomeController@index')->name('mainHome');
Route::get('/viewImage', 'welcomeController@galleryshow')->name('viewGallery');
Route::get('/about','AboutController@index')->name('about');

Route::resource('/Blog','FrontendController');
Route::resource('/Blog/{$id}','FrontendController');
//Route::get('/Blog/{$id}','FrontendController@getBlogbyid')->name('detailblog');
	



Route::get('/ContactMe','ContactController@index')->name('ContactMe');
Route::post('/ContactMe/store','ContactController@store')->name('contactfront');


//*****************-Backend routes-******************


Route::group(['middleware' => ['auth','admin']], function (){
	Route::get('/dashboard','HomeController@admin')->name('admin');
	

	/****************profile******************/
	Route::prefix('profile')->group(function () {
		Route::get('/', 'ProfileController@index')->name('profile');
		Route::post('/store', 'ProfileController@store')->name('imageUpload');
		Route::get('/view-Image', 'ProfileController@show');
	});



	/****************gallery******************/
	Route::prefix('/gallery')->group(function () {
		Route::get('/', 'GalleryController@index')->name('gallery');
		Route::post('/store','GalleryController@store')->name('imageuploadgallery');

	});


	/****************video******************/
	Route::resource('/video', 'VideoController');

	
	


	/***********project************/
	

	Route::resource('/project', 'ProjectController');
	



	/****************Blog******************/

	Route::resource('/blog', 'BlogController');
	



	/**********************contact route*********************/

	Route::get('/contact', 'AdmincontactController@index')->name('contact');
	Route::delete('/contact/destroy/{id}','AdmincontactController@destroy')->name('contactdelete');
	

});

Route::group(['prefix'=>'user','middleware'=>['auth']],
	function(){
		Route::get('/','HomeController@user')->name('user');
});