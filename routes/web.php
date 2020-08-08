<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// <----frontend route------>
Route::get('/download', function(){
	$file = public_path()."/sandeep.docx";
	$headers =array(
		'content_Type: application/docx',

	);
	return Response::download($file,"sandeep.docx",$headers);
});

Route::get('/about',function(){
	return view('frontend.about');
});

Route::get('/', 'welcomeController@index')->name('mainHome');
Route::get('/viewImage', 'welcomeController@galleryshow')->name('viewGallery');


Route::get('/ContactMe','ContactController@index')->name('ContactMe');
Route::post('/ContactMe/store','ContactController@store')->name('contactfront');



Route::group(['middleware' => 'auth'], function (){
	Route::get('/dashboard', function () {
	    return view('admin.dashboard');
	});


Route::prefix('profile')->group(function () {
	Route::get('/', 'ProfileController@index')->name('profile');
	Route::post('/store', 'ProfileController@store')->name('imageUpload');
	Route::get('/view-Image', 'ProfileController@show');
});


Route::prefix('/gallery')->group(function () {
	Route::get('/', 'GalleryController@index')->name('gallery');
	Route::post('/store','GalleryController@store')->name('imageuploadgallery');

});
	

	Route::get('/post', function () {
	    return view('admin.post');
	});


	Route::get('/projects', function () {
	    return view('admin.project');
	});

	Route::get('/contact', function () {
	    return view('admin.contact');
	});

});