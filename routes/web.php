<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', function () {
    return view('home.home');
});
Route::get('/about', function () {
    return view('about.about');
});
Route::get('/team', function () {
    return view('team.team');
});
Route::get('/gallery', function () {
    return view('gallery.gallery');
});
Route::get('/contact', function () {
    return view('contact.contact');
});
Route::get('/service', function () {
    return view('service.service');
});
Route::get('/error404', function () {
    return view('error404.error404');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ask-questions',['uses'=>'PostController@index','as'=>'create.post']);
Route::post('/post-questions',['uses'=>'PostController@postQuestion','as'=>'save.post']);
Route::get('/view-questions',['uses'=>'PostController@viewQuestion','as'=>'show.post']);

//------Video Chat--------
Route::get('/videochat', "VideoRoomsController@index");
Route::prefix('room')->middleware('auth')->group(function() {
   Route::get('join/{roomName}', 'VideoRoomsController@joinRoom');
   Route::post('create', 'VideoRoomsController@createRoom');
});
