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


Route::get('/', 'welcomeController@index');


Route::group(['middleware' => 'auth'], function (){
	Route::get('/dashboard', function () {
	    return view('admin.dashboard');
	});


Route::prefix('profile')->group(function () {
	Route::get('/', 'ProfileController@index');
	Route::post('/store', 'ProfileController@store')->name('imageUpload');
	Route::get('/view-Image', 'ProfileController@show');
});	


	Route::get('/gallery', function () {
	    return view('admin.gallery');
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