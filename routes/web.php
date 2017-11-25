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

Route::get('/', 'TopicController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/topicexception', 'TopicController@topicexception')->name('topicexception');

Route::get('/contentexception', 'ContentController@contentexception')->name('contentexception');

Route::Resource('/topics','TopicController');

Route::group(['prefix'=>'topics'], function(){
	Route::Resource('/{topic}/contents','ContentController');
});