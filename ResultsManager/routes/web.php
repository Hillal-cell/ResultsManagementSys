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

Route::get('/', function () {
	 
    return view('welcome');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('results', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('edit/{id}', ['as' => 'pages.edit', 'uses' => 'App\Http\Controllers\PageController@editResults']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::post('edit/{id}', ['as' => 'pages.update', 'uses' => 'App\Http\Controllers\PageController@editResults']); //  line for POST requests
		Route::get('create', ['as' => 'pages.create', 'uses' => 'App\Http\Controllers\PageController@addStudentMarks']);
		Route::post('store', ['as' => 'pages.store', 'uses' => 'App\Http\Controllers\PageController@addStudentMarks']);  //line for post request
		Route::get('remove/{id}', ['as' => 'pages.remove', 'uses' => 'App\Http\Controllers\PageController@deleteResults']);
		Route::post('results',['as'=>'pages.icons','uses' => 'App\Http\Controllers\StudentsController@upload']);  //line for uploading file with data set
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

